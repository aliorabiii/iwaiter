<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    public function run()
    {
        $members = [
            [
                'name' => 'Ali Orabi',
                'job_title' => 'Full Stack Developer',
                'image' => 'assets/images/ali.png',
                'facebook_url' => '#',
                'linkedin_url' => '#',
            ],
            [
                'name' => 'Majd Rabie',
                'job_title' => 'IT Specialist',
                'image' => 'assets/images/mjd.png',
                'facebook_url' => 'https://www.facebook.com/share/1SosscGsbA/?mibextid=wwXIfr',
                'linkedin_url' => 'https://www.linkedin.com/in/MajdRabie',
            ],
            [
                'name' => 'Hassan Younis',
                'job_title' => 'Web Developer',
                'image' => 'assets/images/hassan.png',
                'facebook_url' => '#',
                'linkedin_url' => 'https://www.linkedin.com/in/hasan-younes-69b2b82b1?',
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(
                ['name' => $member['name']],
                [
                    'job_title' => $member['job_title'],
                    'image' => $member['image'],
                    'facebook_url' => $member['facebook_url'],
                    'linkedin_url' => $member['linkedin_url'],
                ]
            );
        }
    }
}
