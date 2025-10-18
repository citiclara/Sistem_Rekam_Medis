<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        DB::unprepared("
        CREATE TRIGGER IF NOT EXISTS trg_after_insert_visit
        AFTER INSERT ON visits
        BEGIN
        INSERT INTO audit_logs (user, action, reference_table, reference_id, details, created_at)
        VALUES ('system', 'insert_visit', 'visits', NEW.id, 'Visit created', datetime('now'));
        END;
        ");

        DB::unprepared("
        CREATE TRIGGER IF NOT EXISTS trg_after_insert_prescription_item
        AFTER INSERT ON prescription_items
        BEGIN
        UPDATE medications
        SET stock = stock - NEW.qty
        WHERE id = NEW.medication_id;

        INSERT INTO audit_logs (user, action, reference_table, reference_id, details, created_at)
        VALUES ('system', 'reduce_stock', 'prescription_items', NEW.id, 'Stock reduced', datetime('now'));
        END;
        ");

        DB::unprepared("
        CREATE TRIGGER IF NOT EXISTS trg_before_delete_prescription_item
        BEFORE DELETE ON prescription_items
        BEGIN
        UPDATE medications
        SET stock = stock + OLD.qty
        WHERE id = OLD.medication_id;

        INSERT INTO audit_logs (user, action, reference_table, reference_id, details, created_at)
        VALUES ('system', 'restore_stock', 'prescription_items', OLD.id, 'Stock restored', datetime('now'));
        END;
        ");

    }
}
