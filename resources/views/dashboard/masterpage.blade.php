 @include("dashboard.include.top")




    <div class="container-scroller">
 @include("dashboard.include.sidbar")

      <div class="container-fluid page-body-wrapper">







 @include("dashboard.include.nav")

        <div class="main-panel">





  @yield("content")











 @include("dashboard.include.footer")

        </div>
      </div>
    </div>










 @include("dashboard.include.bottom")


