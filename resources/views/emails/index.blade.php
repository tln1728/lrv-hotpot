<!-- attribute accesskey=k on input-> alt k -->
@extends('layout.index')

@section('title')
Send mail
@endsection

@section('content')

<form action="sendmail" method="post" enctype="multipart/form-data" class="max-w-xl mx-auto grid grid-cols-2 gap-4">
    @csrf
    <div class="col-span-2">
        <label for="to" class="block mb-2 text-sm font-medium text-gray-900">To</label>
        <input tabindex="1" value="{{old('to')}}" name="to" type="text" id="to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 resize-y overflow-auto" placeholder="name@flowbite.com" />
    </div>

    <div>
        <label for="cc" class="block mb-2 text-sm font-medium text-gray-900">Cc</label>
        <textarea tabindex="2" name="cc" id="cc" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{old('cc')}}</textarea>
    </div>

    <div>
        <label for="bcc" class="block mb-2 text-sm font-medium text-gray-900">Bcc</label>
        <textarea tabindex="3" name="bcc" id="bcc" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{old('bcc')}}</textarea>
    </div>
    
    <span class="col-span-2 text-sm text-gray-500">Separate multiple email addresses with commas</span>

    <div class="col-span-2">
        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
        <input tabindex="4" value="{{old('subject')}}" name="subject" type="text" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="helo"/>
    </div>

    <div class="col-span-2">
        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Content</label>
        <textarea tabindex="5" name="content" id="content" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Dear Mr.president...">{{old('content')}}</textarea>
    </div>

    <!-- <div class="col-span-2">
        <label for="file" class="block mb-2 text-sm font-medium text-gray-900">File</label>
        <input id="file" name="attachments[]" type="file" multiple
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
    </div> -->

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
</form>

@endsection