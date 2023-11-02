<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            // $table->string('name');  //ชื่อแบบฟอร์ม
            // $table->string('type')->nullable(); //            // trying to addฃ
            $table->longText('desc')->nullable(); // คำอธิบายเอาไว้เวลา admin ต้องการแก้ไข
            $table->longText('checklist')->nullable();//เช็คลิสว่าต้องทำอะไรบ้างแต่ละอย่าง
            $table->string('role');            
            $table->foreignIdFor(\App\Models\Event::class); // Event_id (FK)
            $table->softDeletes();
            $table->timestamps();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
