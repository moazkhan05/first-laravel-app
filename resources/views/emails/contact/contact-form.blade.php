@component('mail::message')

    #Thank You for you message

    :Name: {{ $data['name'] }}
    :Email: {{ $data['email'] }}
    :Phone No: {{ $data['phone_number'] }}
    
    :Message:

    {{ $data['message'] }}
@endcomponent
