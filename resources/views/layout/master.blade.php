<!DOCTYPE html>
<html lang="en">
@include('layout.header')
    <body>
        <div class="ui borderless stackable main menu" style="">
          <div class="ui text container">
            <div href="#" class="header item">
              <img class="logo" src="assets/images/logo.png">
              JPTanTan
            </div>
            <a href="#" class="item">類別一</a>
            <a href="#" class="item">類別二</a>
            <a href="#" class="ui right floated dropdown item" tabindex="0">
              功能選單 <i class="dropdown icon"></i>
              <div class="menu transition hidden" tabindex="-1">
                <div class="item">功能一</div>
                <div class="item">功能二</div>
                <div class="divider"></div>
                <div class="header">Header</div>
              </div>
            </a>
          </div>
        </div>
        @yield('content')
    </body>

@include('layout.footer')
@yield('js')
</html>
