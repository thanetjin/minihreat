<?php


use App\Models\User;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc_lead')->nullable();                     
            $table->string('serial_number')->nullable();
            $table->string('date')->nullable();
            $table->foreignIdFor(User::class); //เพื่อหา event_owner check จาก id
            $table->longText('address')->nullable();
            // $table->string('event_certificate')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('member');
            $table->enum('is_allow', ['ACCEPT','REJECT','SENDING'])->default('SENDING'); 
            $table->string('rejection_reason')->nullable();
            $table->string('image')->nullable();            
            $table->softDeletes();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
