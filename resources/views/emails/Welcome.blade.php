@component('mail::message')
# Hi {{ucfirst($user->fname)}}, welcome to fluidbN family.

@component('mail::panel')
We are so excited to have you in the family. You are a part of us now. 
{{ucfirst($user->fname)}} get ready to experience the information media like never before !
@endcomponent
@component('mail::button', ['url' =>'https://www.fluidbn.com'])
Take me in
@endcomponent

Have a great day and fantastic experience at fluidbN !<br>

@endcomponent