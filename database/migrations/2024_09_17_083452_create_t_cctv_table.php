<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_cctv', function (Blueprint $table) {
            $table->bigIncrements('fc_id');
            $table->char('fc_id_cctv', 10)->nullable();
            $table->string('fv_divisi')->nullable();
            $table->string('fv_sys_type')->nullable();
            $table->string('fv_principle')->nullable();
            $table->string('fv_branch_Name')->nullable();
            $table->string('fv_anydesk')->nullable();
            $table->string('fv_teamviewer')->nullable();
            $table->string('fv_ultraviewer')->nullable();
            $table->string('fv_link_add')->nullable();
            $table->string('fv_link_temp')->nullable();
            $table->char('fc_user_it', 8)->nullable();
            $table->char('fc_password_it', 15)->nullable();
            $table->char('fc_user_sysadm', 8)->nullable();
            $table->char('fc_password_sysadm', 15)->nullable();
            $table->string('fv_status_hdd_ext')->nullable();
            $table->char('fc_username', 8)->nullable();
            $table->string('fc_serial')->nullable();
            $table->char('fc_user', 8)->nullable();
            $table->char('fc_password', 15)->nullable();
            $table->integer('fn_qty_cam')->nullable();
            $table->char('fc_region', 30)->nullable();
            $table->char('fc_status', 1)->nullable();
            $table->string('fv_ket_error')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_cctv');
    }
};
