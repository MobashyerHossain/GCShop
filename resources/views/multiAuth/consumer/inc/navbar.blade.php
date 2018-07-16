<div class="fixed-top">
  <nav class="navbar navbar-dark bg-dark navbar-expand-md navigation-clean-button">
    <div class="container">
      <a class="navbar-brand" href="/">
        {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav mr-auto">
          
        </ul>
        <ul class="nav navbar-nav ml-auto">
          @include('multiAuth.consumer.inc.logtab')
          @include('multiAuth.consumer.inc.carttab')
        </ul>
      </div>
    </div>
  </nav>
</div>
