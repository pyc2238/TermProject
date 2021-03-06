@extends('layouts.app')
@section('title')
    @lang('penpal/component/introduction.title')
@endsection
@section('penpal')
<link rel="stylesheet" href="{{asset('/css/penpal/penpal.css')}}">
@endsection
@section('content')
@include('penpal.component.menu')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-12">
            <div class="row justify-content-center penpal-main-container">
                <div class="col">
                    <img src="{{asset("data/ProjectImages/master/logoImage/14.png")}}" width="72" alt="thumbnail">
                    <h2 style='display:inline-block;'>@lang('penpal/component/introduction.subject')</h2>
                    <hr>
                    
                    @if(Session::get('locale') == 'ja')
                        <b style="color:blue;">サービス趣旨</b>
                        <br>
                        <br>
                        <p>1) ペンパルサービスは非常に個人的な個人間の交流です。 他の意図でご利用になったり,政治的な歴史的話は禁じます。</p>
                        <p>2) 悪意的な使用,迷惑メール,相手に不快感を与えるユーザーを強く拒絶します。</p>

                        <br>
                        <br>

                        <b style="color:blue;">基本ルール</b>
                        <br>
                        <br>

                        <p>1) 1日10回のメッセージ伝送可能。</p>
                        <p>2) 相互友達成立時には無制限のメッセージ伝送が可能。</p>

                        <br>
                        <br>

                        <b style='color:blue;'>ポイント制</b>
                        <br>
                        <br>
                        <p>毎日の零時ポイント獲得制限が初期化されます。</p>
                        <p>毎月上位ポイント獲得ユーザーの別名がメインページにさらされます。</p>
                        <p>1)一日最初のログイン2点獲得可能</p>
                        <p>2)メール友1回1点を獲得して1日最大5点獲得可能</p>
                        <p>3)の掲示板1回書き込み登録時の1点を獲得して1日最大5点獲得可能</p>
                        <p>4)タイムライン1回書き込み登録時の1点を獲得して1日最大3点獲得可能</p>
                        <p>5)メール友10回7点を獲得可能</p>

                        <br>
                        <br>
                        <b style="color:blue;">安全なペンパルサービス</b>
                        <br>
                        <br>
                        <p>1) ペンパル登録時,個人の電話番号,電子メール,特定IDやアカウント情報を記入しないでください。 </p>
                        <p>2) ニックネームをご利用ください。</p>
                        <p>3) ペンパル登録後,優先的に安全にNEITTEER内のメッセージシステムを利用して交流することをお勧めします。</p>
                        <p>4) 望まない相手,不快な相手に対してはブロック機能で相手を遮断することができます。</p>
                        <p>5) 交流を通じて相互にNEITTEER友達登録が相互に受諾された場合は,基本ルールに関係なく自由にメッセージを利用することができます。</p>

                    @else
                        <b style="color:blue;">서비스 취지</b>
                        <br>
                        <br>
                        <p>1) 펜팔서비스는 지극히 개인적인 개인간의 교류입니다. 다른 의도를 가지고 이용하시거나 정치적 역사적 이야기는 금합니다.</p>
                        <p>2) 악의적인 사용, 스팸성 메일, 상대방에게 불쾌감을 주는 유저를 강력히 거절 합니다.</p>

                        <br>
                        <br>

                        <b style="color:blue;">기본룰</b>
                        <br>
                        <br>
                        <p>1) 1일 10회의 메세지 전송 가능.</p>
                        <p>2) 상호 친구 성립 시에는 무제한 메세지 전송 가능.</p>
                        
                        <br>
                        <br>

                        <b style="color:blue;">포인트제</b>
                        <br>
                        <br>
                        <p>매일 자정 포인트 획득 제한이 초기화됩니다.</p>
                        <p>매월 상위 포인트 획득 유저의 별명이 메인 페이지에 노출됩니다.</p>
                        <p>1)일일 최초 로그인 2점 획득 가능</p>
                        <p>2)펜팔 1회 1점을 획득하여 하루 최대 5점 획득가능</p>
                        <p>3)게시판 1회 글 등록시 1점을 획득하여 하루 최대 5점 획득가능</p>
                        <p>4)타임라인 1회 글 등록시 1점을 획득하여 하루 최대 3점 획득가능</p>
                        <p>5)펜팔 10회 7점을 획득가능</p>
                        
                        


                        <br>
                        <br>

                        <b style="color:blue;">안전한 펜팔 서비스</b>
                        <br>
                        <br>
                        <p>1) 펜팔 등록 시 개인의 전화번호, 이메일, 특정 아이디나 계정 정보를 기입하지 말아 주십시요. </p>
                        <p>2) 닉네임을 이용해주세요.</p>
                        <p>3) 펜팔 등록후 우선적으로 안전하게 NEITTER내의 멧세지 시스템을 이용하여 교류 하시는 것을 권장합니다.</p>
                        <p>4) 원치 않은 상대, 불쾌한 상대에 대해서는 블록 기능으로 상대방을 차단할 수 있습니다.</p>
                        <p>5) 교류를 통하여 서로 NEITTER 친구등록이 상호간에 수락된 경우에는 기본 룰에 관계없이 자유롭게 쪽지를 이용 하실 수 있습니다.</p>

                    @endif



                  
                </div>
                <div class="w-100"></div>
            
            </div>
        </div>

    </div>

</div>




@endsection
