@foreach ($comments as $cmt)
<!-- Single comment -->
<div class="flex items-start gap-3 mt-4">
    <!-- User avatar -->
    <img class="rounded-full w-10 h-10" src="https://picsum.photos/700/700" alt="">

    <!-- Comment info -->
    <div>
        <div class="bg-white rounded py-2 pl-2 pr-5">
            <!-- Username, date -->
            <div class="flex items-center gap-2">
                <h3 class="font-semibold">{{$cmt -> user -> name}}</h3>
                <span class="text-sm text-gray-500">{{$cmt -> created_at}}</span>
            </div>
            <!-- Comment content -->
            <p class="mt-1">{!! nl2br(e($cmt->content)) !!}</p>
        </div>

        <!-- cmt -> files -->
        @if(false)
        <div class="mt-2">
            <img src="" alt="" class="w-2/12 h-auto">
        </div>
        @endif

        <button onclick={{"toggleReplyForm({$cmt -> id})"}} class="text-blue-500 hover:underline mt-2">Reply</button>
    </div>
</div>

<!-- Reply comment form  -->
<form id="replyForm{{$cmt -> id}}" action="{{route('blog.comments.replies.store',$cmt -> id)}}" method="POST" class="mt-4 ml-12 hidden" enctype="multipart/form-data">
    @csrf
    <textarea name="content" placeholder="Write a comment..." class="w-full p-2 border rounded mb-2"></textarea>
    <div class="flex items-center gap-3">
        <!-- <input type="file" name="attachment" id="file-upload-{{$cmt->id}}" class="hidden"> -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Post Comment</button>
        <!-- <label for="file-upload-{$cmt->id}}" class="cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
            </svg>
        </label> -->
    </div>
</form>

@if ($cmt -> replies -> count() > 0)
    @foreach ($cmt -> replies as $reply)
    <div class="flex items-start gap-3 mt-4 ml-12">
        <!-- User avatar -->
        <img class="rounded-full w-10 h-10" src="https://picsum.photos/700/700" alt="">
    
        <!-- Comment info -->
        <div>
            <div class="bg-white rounded py-2 pl-2 pr-5">
                <!-- Username, date -->
                <div class="flex items-center gap-2">
                    <h3 class="font-semibold">{{$reply -> user -> name}}</h3>
                    <span class="text-sm text-gray-500">{{$reply -> created_at}}</span>
                </div>
                <!-- Comment content -->
                <p class="mt-1">{{$reply -> content}}</p>
            </div>
    
            <!-- cmt -> files -->
            @if(false)
            <div class="mt-2">
                <img src="" alt="" class="w-2/12 h-auto">
            </div>
            @endif
    
            <button onclick={{"toggleReplyForm({$reply -> id})"}} class="text-blue-500 hover:underline mt-2">Reply</button>
        </div>
    </div>
    
    <!-- Reply form -->
    <form id="replyForm{{$reply -> id}}" action="{{route('blog.comments.replies.store',$cmt -> id)}}" method="POST" class="mt-4 ml-12 hidden" enctype="multipart/form-data">
        @csrf
        <textarea name="content" placeholder="Write a comment..." class="w-full p-2 border rounded mb-2"></textarea>
        <div class="flex items-center gap-3">
            <!-- <input type="file" name="attachment" id="file-upload-{{$cmt->id}}" class="hidden"> -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Post Comment</button>
            <!-- <label for="file-upload-{$cmt->id}}" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
            </label> -->
        </div>
    </form>
    @endforeach
@endif

@endforeach