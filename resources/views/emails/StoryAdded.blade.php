@component('mail::message')
# Hi there, people you follow are adding stories.

@component('mail::panel')
{{ucfirst($user->fname).' '.ucfirst($user->lname).' added a new story titled - '.ucfirst($article->title).' in category - '.ucfirst($article->ofGenre->name)}}
@endcomponent
@component('mail::button', ['url' =>$url])
Read now
@endcomponent

Have a great day and fantastic experience at fluidbN !<br>

@endcomponent