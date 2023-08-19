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
            $table->string('event_name');
            $table->foreignIdFor(User::class); //เพื่อหา event_owner check จาก id
            $table->string('event_content');
            $table->string('event_certificate')->nullable();
            $table->boolean('event_status')->default(false);
            // $table->boolean('event_is_allow')->default(false); // false แสดงให้แอดมินว่าเปลี่ยน true ไหม
            $table->enum('event_is_allow', ['ACCEPT','REJECT','SENDING'])->default('SENDING'); 
            $table->string('event_rejection_reason')->default(null);
            $table->integer('event_money');
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
