@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-semibold mb-4">Help & Support</h1>
                
                <div class="prose max-w-none">
                    <h2>Frequently Asked Questions</h2>
                    
                    <div class="space-y-4 mb-8">
                        <div class="border rounded-lg p-4">
                            <h3 class="text-lg font-medium">How do I add a new user?</h3>
                            <p>To add a new user, navigate to the User Management section and click on the "Add User" button. Fill in the required information and submit the form.</p>
                        </div>
                        
                        <div class="border rounded-lg p-4">
                            <h3 class="text-lg font-medium">How do I manage bins?</h3>
                            <p>You can manage bins by going to the Bins Management section. From there, you can add, edit, or delete bins as needed.</p>
                        </div>
                        
                        <div class="border rounded-lg p-4">
                            <h3 class="text-lg font-medium">How do I send messages to users?</h3>
                            <p>To send messages, go to the Messages section and click on "Send Message". Select the recipients and compose your message.</p>
                        </div>
                    </div>
                    
                    <h2>Contact Support</h2>
                    <p>If you need further assistance, please contact our support team:</p>
                    <ul>
                        <li>Email: support@ecobin.com</li>
                        <li>Phone: +250780904149</li>
                        <li>Hours: Monday - Friday, 9:00 AM - 5:00 PM EST</li>
                    </ul>
                    
                    <h2>User Guide</h2>
                    <p>For a comprehensive guide on how to use the EcoBin Admin platform, please download our user manual:</p>
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-black bg-green-700 hover:bg-green-800 shadow-md" style="background-color: #008000;margin-top: 10px;">
                        <svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download User Manual
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 