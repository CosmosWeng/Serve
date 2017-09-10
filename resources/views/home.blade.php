@extends('layout.master')
@section('content')


  <div class="ui grid ">
    <div class="column row">
      <div class="ui shape right floated ten wide column">
        <div class="sides">
          <div class="ui active side small images">
            <img src="/images/wireframe/image.png">
            <img src="/images/wireframe/image.png">
          </div>
          <div class="ui side small images">
            <img class="ui circular image" src="/images/wireframe/image.png">
            <img class="ui circular image" src="/images/wireframe/image.png">
          </div>
        </div>
      </div>
      <div class="ui right floated four wide column hidden">
          <form class="ui conten form">
            <div class="field">
              <input type="text" name="login-email" placeholder="Email">
            </div>
            <div class="field">
              <input type="password" name="login-password" placeholder="Password">
            </div>
            <button class="ui button" type="submit">Login</button>
          </form>
      </div>
    </div>
  </div>

  <div class="ui divider"></div>

  <div class="ui four column grid doubling stackable container">
    <div class="ui column">
      <div class="ui segments">
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
      </div>
    </div>
    <div class="ui column">
      <div class="ui segments">
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
      </div>
    </div>
  </div>
  <div class="ui four column grid doubling stackable container">
    <div class="ui column">
      <div class="ui segments">
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
      </div>
    </div>
    <div class="ui column">
      <div class="ui segments">
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

      // show dropdown on hover
      $('.main.menu  .ui.dropdown').dropdown({
        on: 'hover'
      });
    });
  </script>

@endsection
