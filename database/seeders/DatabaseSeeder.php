<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create();
        $total = User::count();
        if($total > 0){
            echo "There are {$total} users in database \n";
            return ;
        }
        $user = new User();
        $user->name = "admin";
        $user->email = "Admin@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "admin";
        $user->address = fake()->paragraph();
        $user->save();
        
        $user = new User();
        $user->name = "asset";
        $user->email = "asset@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "asset";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user2";
        $user->email = "user2@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user3";
        $user->email = "user3@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user4";
        $user->email = "user4@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user5";
        $user->email = "user5@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->address = fake()->paragraph();
        $user->save();

        $event = new Event();
        $event->name = 'งานรับน้อง';
        $event->user_id = 2;
        $event->member = 10;
        $event->address = 'อะไรก็ได้เอามาเถอะ';
        $event->status = false;
        $event->rejection_reason = '';
        
        $event->image = "image/cert_1.jpeg";
        $event->save();
        
        $event = new Event();
        $event->name = 'กิจกรรมเพื่อส่งเสริมสุขภาพ';
        $event->user_id = 3;
        $event->member = 10;
        $event->address = 'อิอิ';
        $event->status = false;
        $event->rejection_reason = '-';
        
        $event->image = "image/cert_2.jpeg";

        $event->save();


        $event = new Event();
        $event->name = 'การเปิดนิทรรศการศิลปะ';
        $event->user_id = 4;
        $event->member = 10;
        $event->address = 'นิทรรศการการศิลปะ เพื่อ การสร้างสรรค์';
        $event->status = false;
        
        $event->rejection_reason = '-';
        $event->image = "image/cert_3.jpeg";
        $event->save();

        $event = new Event();
        $event->name = 'อาสาสมัครในชุมชน';
        $event->user_id = 5;
        $event->member = 10;
        $event->address = 'มาลองคิด คณิตศาสตร์ แสนสนุกกัน สนใจมาเข้าร่วมกันไหม';
        $event->status = false;
        
        $event->rejection_reason = '-';
        $event->image = "image/cert_4.jpeg";
        $event->save();

        $event = new Event();
        $event->name = 'โครงการเรียนรู้ออนไลน์';
        $event->user_id = 3;
        $event->member = 10;
        $event->address = 'อังกฤษฟังพูดอ่านเขียน เรียน ก็ง่ายสนใจมาเข้าร่วมกันไหม';
        $event->status = false;
        
        $event->rejection_reason = '-';
        $event->image = "image/cert_5.jpeg";
        $event->save();

        // มีใครบ้าง
        $event = Event::find(1);
        $event->users()->attach(3);
        
        
        $event = Event::find(2); 
        $event->users()->attach(4);
        $event->users()->attach(5);

        $event->users()->attach(5);
        $event->users()->attach(5);
        $event->users()->attach(5);
        $event->users()->attach(5);
        $event->users()->attach(5);
        $event->users()->attach(5);
        $event->users()->attach(5);
        $event->users()->attach(5);

        $event = Event::find(3);
        $event->users()->attach(2);

        // $task = new Task();
        // $task->name = 'ทำตารางกิจกรรม';
        // $task->type = 'done';
        // $task->event_id = 1;
        // $task->save();

        // $task = new Task();
        // $task->name = 'ทำโปสเตอร์ประกาศและนำไปประกาศ';
        // $task->type = 'done';
        // $task->event_id = 1;
        // $task->save();

        // $task = new Task();
        // $task->name = 'เตรียมอุปกรณ์ที่จำเป็น';
        // $task->type = 'inProgress';
        // $task->event_id = 1;
        // $task->save();

        // $task = new Task();
        // $task->name = 'หาและจัดเตรียมสถานที่';
        // $task->type = 'todo';
        // $task->event_id = 1;
        // $task->save();
        
        // $task = new Task();
        // $task->name = 'กำหนดเป้าหมายของกิจกรรม';
        // $task->type = 'done';
        // $task->event_id = 2;
        // $task->save();

        // $task = new Task();
        // $task->name = 'เลือกกิจกรรมที่เหมาะสมกับเป้าหมายกิจกรรม';
        // $task->type = 'done';
        // $task->event_id = 2;
        // $task->save();

        // $task = new Task();
        // $task->name = 'จัดเตรียมสถานที่และอุปกรณ์ที่จำเป็น';
        // $task->type = 'inProgress';
        // $task->event_id = 2;
        // $task->save();

        // $task = new Task();
        // $task->name = 'วางแผนการดำเนินกิจกรรมและสร้างกำหนดการ';
        // $task->type = 'inProgress';
        // $task->event_id = 2;
        // $task->save();

        // $task = new Task();
        // $task->name = 'เปิดกิจกรรม และ ส่งเสริมกิจกรรมให้ผู้เข้าร่วมระหว่างทำกิจกรรม';
        // $task->type = 'todo';
        // $task->event_id = 2;
        // $task->save();

        // $task = new Task();
        // $task->name = 'เลือกหัวข้อหรือแนวทางของนิทรรศการ';
        // $task->type = 'done';
        // $task->event_id = 3;
        // $task->save();

        // $task = new Task();
        // $task->name = 'จัดหาพื้นที่สำหรับจัดนิทรรศการ';
        // $task->type = 'done';
        // $task->event_id = 3;
        // $task->save();

        // $task = new Task();
        // $task->name = 'วางแผนการจัดนิทรรศการและการจัดวางงานศิลปะ';
        // $task->type = 'inProgress';
        // $task->event_id = 3;
        // $task->save();

        // $task = new Task();
        // $task->name = 'สร้างการตลาดและโปรโมทนิทรรศการ';
        // $task->type = 'inProgress';
        // $task->event_id = 3;
        // $task->save();

        // $task = new Task();
        // $task->name = 'เปิดนิทรรศการ';
        // $task->type = 'todo';
        // $task->event_id = 3;
        // $task->save();

        // $task = new Task();
        // $task->name = 'เลือกหัวข้อหรือแนวทางของนิทรรศการ';
        // $task->type = 'done';
        // $task->event_id = 4;
        // $task->save();

        // $task = new Task();
        // $task->name = 'จัดหาพื้นที่สำหรับจัดนิทรรศการ';
        // $task->type = 'done';
        // $task->event_id = 4;
        // $task->save();

        // $task = new Task();
        // $task->name = 'วางแผนการจัดนิทรรศการและการจัดวางงานศิลปะ';
        // $task->type = 'done';
        // $task->event_id = 4;
        // $task->save();

        // $task = new Task();
        // $task->name = 'สร้างการตลาดและโปรโมทนิทรรศการ';
        // $task->type = 'done';
        // $task->event_id = 4;
        // $task->save();

        // $task = new Task();
        // $task->name = 'เปิดนิทรรศการ';
        // $task->type = 'todo';
        // $task->event_id = 4;
        // $task->save();

        // $task = new Task();
        // $task->name = 'ระบุหัวข้อหรือกระบวนการที่ต้องการสอน';
        // $task->type = 'done';
        // $task->event_id = 5;
        // $task->save();

        // $task = new Task();
        // $task->name = 'เลือกสื่อและเครื่องมือที่เหมาะสมสำหรับการเรียนรู้ออนไลน์';
        // $task->type = 'done';
        // $task->event_id = 5;
        // $task->save();

        // $task = new Task();
        // $task->name = 'ออกแบบเนื้อหาการเรียนรู้และกิจกรรม';
        // $task->type = 'done';
        // $task->event_id = 5;
        // $task->save();

        // $task = new Task();
        // $task->name = 'สร้างแพลตฟอร์มออนไลน์สำหรับการเรียนรู้ หรือ เตรียมเนื้อหาที่จะใช้สอน';
        // $task->type = 'inProgress';
        // $task->event_id = 5;
        // $task->save();

        // $task = new Task();
        // $task->name = 'ประชาสัมพันธ์และเชิญชวนผู้สนใจเข้าร่วมโครงการเรียนรู้';
        // $task->type = 'todo';
        // $task->event_id = 5;
        // $task->save();

        // $task = new Task();
        // $task->name = 'เปิดกิจกรรม';
        // $task->type = 'todo';
        // $task->event_id = 5;
        // $task->save();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(UserSeeder::class);

        
        // $this->call(ToolSeeder::class);
        $this->call([
            ToolSeeder::class,           
        ]);


    }
}
