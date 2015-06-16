<!-- tag and link -->
<div class="container-fluid tag-link">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="col-sm-6">
          <div class="widget">
              <h4 class="title">标签云</h4>
              <div class="content tag-cloud">
                @foreach($tag as $v)
                <a href="{{ url('tag/'.$v->id) }}">{{ $v->name }}</a>
                @endforeach
              </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="widget">
              <h4 class="title">友情链接</h4>
              <div class="content tag-cloud">
                @foreach($link as $v)
                <a href="{{ $v->url }}" title="{{ $v->des }}" target="_blank">{{ $v->name }}</a>
                @endforeach
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end tag and link -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p class="copyright text-muted">{{ $webset->copy }}</p>
            </div>
        </div>
    </div>
</footer>
