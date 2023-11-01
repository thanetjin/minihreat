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
        $user->name = "staff";
        $user->email = "staff@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "staff";
        $user->duty = "chemicalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user2";
        $user->email = "user2@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->address = fake()->paragraph();
        $user->duty = "chemicalEngineer";
        $user->save();

        $user = new User();
        $user->name = "user3";
        $user->email = "user3@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->address = fake()->paragraph();
        $user->duty = "fireman";
        $user->save();

        $user = new User();
        $user->name = "user4";
        $user->email = "user4@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "chemicalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user5";
        $user->email = "user5@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "eletricalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user6";
        $user->email = "user6@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "eletricalEngineer";
        $user->address = fake()->paragraph();
        $user->save();
        
        $user = new User();
        $user->name = "user7";
        $user->email = "user7@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "eletricalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user8";
        $user->email = "user8@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "eletricalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user9";
        $user->email = "user9@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "eletricalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user10";
        $user->email = "user10@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "eletricalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        

        $user = new User();
        $user->name = "user11";
        $user->email = "user11@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "eletricalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user12";
        $user->email = "user12@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "eletricalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user13";
        $user->email = "user13@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "eletricalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        $user = new User();
        $user->name = "user13";
        $user->email = "user14@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "user";
        $user->duty = "eletricalEngineer";
        $user->address = fake()->paragraph();
        $user->save();

        $event = new Event();
        $event->name = 'บริษัท ฟีนิกซ์เมทัล จำกัด';
        $event->serial_number = '50100044625645';
        $event->user_id = 3;
        $event->member = 8;
        $event->address = '21-29 ถ.นาคราช แขวงคลองมหานาคเขตป้อมปราบ จ.กรุงเทพฯ 10100';
        $event->status = false;
        $event->rejection_reason = '';        
        $event->image = "event_images/m1.jpg";
        
        $event->save();
        
        $event = new Event();
        $event->name = 'บริษัท พัฒนพลาสติก';
        $event->serial_number = '50100044625645';
        $event->user_id = 3;
        $event->member = 8;
        $event->address = '1573-5 ถ.สุขมุวิท ซ.สาลีนิมิต เขตวัฒนา จ.กรุงเทพฯ 10110';
        $event->status = false;
        $event->rejection_reason = '-';        
        $event->image = "event_images/m2.jpg";
        $event->save();


        $event = new Event();
        $event->name = 'การเปิดนิทรรศการศิลปะ';
        $event->serial_number = '50100044625645';
        $event->user_id = 3;
        $event->member = 8;
        $event->address = '1379 ถ.จนัทน์แขวงทุ่งวัดดอน เขตสาธร จ.กรุงเทพฯ 10120';
        $event->status = false;
        $event->image = "event_images/m3.jpg";
        $event->rejection_reason = '-';        
        $event->save();
// 339 หมู่18 ถ.สุขสวสั ด์ิต.บางพ่ึงอ.พระประแดงจ.สมทุ รปราการ 10130
        $event = new Event();
        $event->name = 'อาสาสมัครในชุมชน';
        $event->serial_number = '50100044625645';
        $event->address = '339 หมู่18 ถ.สุขสวัสด์ิ ต.บางพ่ึง อ.พระประแดง จ.สมทุรปราการ 10130';
        $event->image = "event_images/m4.jpg";
        $event->user_id = 3;
        $event->member = 8;        
        $event->status = false;
        
        $event->rejection_reason = '-';
        $event->image = "event_images/esXIgyQffVeb3hk3GpHlAjsBXHxuUh2B70ZcHz4r.jpg";
        $event->save();
        // มีใครบ้าง
        $event = Event::find(1);
        
        
        
        $event = Event::find(2); 
        $event->users()->attach(4);
        $event->users()->attach(5);

        $event = Event::find(3); 
        $event->users()->attach(4);
        $event->users()->attach(5);

        $event = Event::find(4);         
        $event->users()->attach(5);
        $event->users()->attach(6);
        $event->users()->attach(7);
        $event->users()->attach(8);
        $event->users()->attach(9);
        $event->users()->attach(10);
        $event->users()->attach(11);
        


                
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
