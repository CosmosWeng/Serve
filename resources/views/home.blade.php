@extends('layout.master')
@section('content')


  <div class="row">
    <div class="ui pull-right">
      <form class="ui form segment">
        <div class="field">
          <input type="text" name="login-email" placeholder="Email">
        </div>
        <div class="field">
          <input type="password" name="login-password" placeholder="Password">
        </div>
        <div class="ui button">Login</div>
      </form>
      <div class="ui card">
        <div class="content">
          <img class="right floated small ui image" src="/images/avatar2/large/kristy.png">
          <div class="header">
            Elliot Fu
          </div>
          <div class="meta">
            Friends of Veronika
          </div>
          <div class="description">
            <div class="ui blue progress">
              <div class="bar">
                <div class="label">Rating</div>
              </div>

            </div>

          </div>
        </div>
        <div class="extra content">
          <div class="ui two buttons">
            <div class="ui basic green button">Approve</div>
            <div class="ui basic red button">Decline</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="sticky">
      <div id="articles" class="">
        <div class="ui four column grid doubling stackable container">
          <div class="ui column">
            <div class="ui segments">
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
            </div>
          </div>
          <div class="ui column">
            <div class="ui segments">
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
            </div>
          </div>
          <div class="ui column">
            <div class="ui segments">
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
            </div>
          </div>
          <div class="ui column">
            <div class="ui segments">
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
              <div class="ui segment">Content</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
  $(document).ready(function() {
      // fix main menu to page on passing
      $('.main.menu').visibility({
        type: 'fixed'
      });

      $('.overlay').visibility({
        type: 'fixed',
        offset: 80
      });

      // lazy load images
      $('.image').visibility({
        type: 'image',
        transition: 'vertical flip in',
        duration: 500
      });

      $('.shape')
        .shape('flip up');

      $('.ui.sticky').sticky({
        offset       : 50,
        context: '#articles'
      });

      // show dropdown on hover
      $('.main.menu  .ui.dropdown').dropdown({
        on: 'hover'
      });
    });
  </script>

@endsection
