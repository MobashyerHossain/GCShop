<div id="accordion">
  <ul class="list-group list-group-flush">
      @foreach($carmakers as $carmaker)
        <li class="list-group-item p-0 m-0 pl-3 bg-transparent">
          <a data-toggle="collapse" data-target="#collapse{{$carmaker->id}}" aria-expanded="true" aria-controls="collapse{{$carmaker->id}}">
            {{$carmaker->name}}
          </a>

          <div id="collapse{{$carmaker->id}}" class="collapse show" aria-labelledby="heading{{$carmaker->id}}" data-parent="#accordion">
            <ul class="list-group list-group-flush">
                @foreach($carmaker->getModels() as $carmodel)
                  <li class="list-group-item p-0 m-0 pl-3 bg-transparent">
                    <span class="d-inline-flex"><i class="fa fa-caret-right text-secondary" style="margin-right:15px;"></i></span>
                    <a class="d-inline-flex nav-link  text-light" href="#" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:16px;">{{$carmodel->name}}</a>
                  </li>
                @endforeach
            </ul>
          </div>
        </li>
      @endforeach
  </ul>
</div>
