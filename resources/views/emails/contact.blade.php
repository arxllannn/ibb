<x-mail::message>
{{--# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>--}}

You have received a new message from your contact form.

**Name:** {{ $name }}  
**Phone:** {{ $phone }}  
**Email:** {{ $email }}  
**Subject:** {{ $subject }}  

**Message:**  
{{ $message }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
