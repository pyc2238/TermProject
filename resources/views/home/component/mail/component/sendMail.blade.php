<html>
@include('home.component.mail.component.mailHeader')

<body>
    @include('home.component.mail.component.mailNav')


    <div class="row">
        <div class="col"></div>
        <div class="col-6">



            <form action="{{ route('penpal.sendMail') }}" method="post" style="margin-top:8%;margin-bottom:8%"
                enctype="multipart/form-data">

                @csrf

                <i class="fa fa-exclamation-circle"><label for="inputNickname"><b>@lang('home/mail/sendMail.nickname')</b></label></i>
                @if($name != null)
                <input type="text" name="recipient_name" class="form-control" autocomplete=off value="{{ $name }}">
                @else
                <input type="text" name="recipient_name" class="form-control" autocomplete=off>
                @endif
                <br>
                <br>


                <div class="form-group">
                    <label for="comment"><b>@lang('home/mail/sendMail.content')</b></label>
                    <textarea class="form-control" rows="5" style="resize: none;" name="content" autocomplete=off
                        required></textarea>
                </div>
                <br>
                <br>

                
                <label for="exampleFormControlFile1">@lang('home/mail/sendMail.photo')</label>
              
                <input type="file" name="file" class="form-control" id="exampleFormControlFile1">

                <br>
                <br>
                <br>

                <button style="padding-left:50%;padding-right:50%;" class="btn btn-primary " type="submit"><i
                        class="fa fa-pencil">@lang('home/mail/sendMail.send')</i></button>
            </form>

        </div>
        <div class="col"></div>
    </div>

    @include('home.component.mail.component.mailFooter')



</body>

</html>
