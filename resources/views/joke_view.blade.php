<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('style.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="app">
        <div class="header">
            <div class="header-logo">
                <img src="{{asset('img/logo.webp')}}" alt="">
            </div>
            <div class="header-profile">
                <div class="profile-text">
                    <p>Handicafted by</p>
                    <p>JimHLS</p>
                </div>
                <div class="profile-img">
                    <img src="{{asset('img/flower.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="container-header">
                <div>
                    <h2>A joke a day keeps the doctor away</h2>
                    <p>If you joke wrong way, your teach how to pay. (Serious)</p>  
                </div>                         
            </div>
            <div class="container-content">
                @if($joke)
                    @foreach ($joke as $jokes)
                    <p id="text-content">
                        {{$jokes->jokecontent}} 
                    </p>
                    <div class="container-button">
                        <input name="btnFunnt" data-url="{{ route('jokeVote.voteFun',[$jokes->id]) }}" status="1" class="container-button__blue" type="button" value="This is Funny!">
                        <input name="btnFunnt" data-url="{{ route('jokeVote.voteFun',[$jokes->id]) }}" status="0" class="container-button__green" type="button" value="This is not Funny.">
                    </div>
                    @endforeach
                    @else
                    <p>That's all the jokes for today! Come back another day!</p>
                @endif
            </div>           
        </div>
        <div class="footer">
            <p>
                A child asked his father, "How were people born?" So his father said, "Adam and Eve made babies, then their babies became adults and made babies, and so on."
                The child then went to his mother, asked her the same question and she told him, "We were monkeys then we evolved to become like we are now."
                
            </p>            
           
           <p>ThorMetal Design</p>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).on('click', "input[name='btnFunnt']", function () {
        var url = $(this).attr('data-url');
        var status = $(this).attr('status');
        // console.log(url)
            $.ajax({
                method: 'POST',
                url: url,
                data: { _token: '{{csrf_token()}}', status: status },
                success: function(response) {
                    $('#text-content').text(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
    })
</script>
</html>