<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // PATIENTS
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('medical_record_no')->unique();
            $table->string('full_name');
            $table->date('dob')->nullable();
            $table->char('gender', 1)->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });

        // DOCTORS
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('full_name');
            $table->string('specialization')->nullable();
            $table->timestamps();
        });

        // MEDICATIONS
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->integer('stock')->default(0);
            $table->integer('min_stock')->default(5);
            $table->string('unit')->default('tablet');
            $table->timestamps();
        });

        // VISITS
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->dateTime('visit_date')->default(now());
            $table->text('diagnosis')->nullable();
            $table->text('actions')->nullable();
            $table->timestamps();
        });

        // PRESCRIPTIONS
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visit_id')->constrained('visits');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->dateTime('date')->default(now());
            $table->timestamps();
        });

        // PRESCRIPTION ITEMS
        Schema::create('prescription_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prescription_id')->constrained('prescriptions');
            $table->foreignId('medication_id')->constrained('medications');
            $table->integer('qty');
            $table->string('dose')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });

        // AUDIT LOGS
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable();
            $table->string('action');
            $table->string('reference_table');
            $table->integer('reference_id');
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('prescription_items');
        Schema::dropIfExists('prescriptions');
        Schema::dropIfExists('visits');
        Schema::dropIfExists('medications');
        Schema::dropIfExists('doctors');
        Schema::dropIfExists('patients');
    }
};
