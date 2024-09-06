<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class WeeklyUserReport extends Command
{
    // Command name and description
    protected $signature = 'report:weeklyusers';
    protected $description = 'Generate a weekly report of new users and send to admin email';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get users registered in the last 7 days
        $users = User::where('created_at', '>=', Carbon::now()->subDays(7))->get();

        // If no new users, return
        if ($users->isEmpty()) {
            $this->info('No new users registered in the last 7 days.');
            return;
        }

        // Define the CSV file name and path
        $fileName = 'weekly_user_report_' . now()->format('Y-m-d') . '.csv';
        $filePath = storage_path("app/{$fileName}");

        // Create the CSV file
        $handle = fopen($filePath, 'w');
        // Add CSV headers
        fputcsv($handle, ['ID', 'Name', 'Email', 'Created At']);

        // Add user data to CSV
        foreach ($users as $user) {
            fputcsv($handle, [$user->id, $user->name, $user->email, $user->created_at]);
        }

        // Close the file handle
        fclose($handle);

        // Send email with the CSV file attached
        $this->sendEmailWithAttachment($filePath, $fileName);

        // Remove the file after sending
        Storage::delete($filePath);

        $this->info('Weekly report generated and email sent successfully.');
    }

    // Method to send email with attachment
    protected function sendEmailWithAttachment($filePath, $fileName)
    {
       // $toEmail = 'info@waliiftransport.com';
        $toEmail = 'tekaberako475@gmail.com';
        
        Mail::raw('Please find attached the weekly report of newly registered users.', function($message) use ($filePath, $fileName, $toEmail) {
            $message->to($toEmail)
                    ->subject('Weekly User Report')
                    ->attach($filePath, [
                        'as' => $fileName,
                        'mime' => 'text/csv',
                    ]);
        });
    }
}
