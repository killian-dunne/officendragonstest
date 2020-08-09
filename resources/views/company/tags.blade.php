<div class="modal fade" id="{{ 'tagsModal-'.$id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">{{ $company->name }}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body categories">
        <?php $company_tag_ids = array_column($company->tags, 'id'); ?>
        <form action="{{ url('tags', $company->id) }}" method="post">
          @foreach($tags as $category)
            <div class="form-group category">
              @if($loop->index != 0)
                <hr>
              @endif
              <h5>{{ $category->first()->category }}</h5>
              <div class="d-flex flex-row justify-content-center">
                @foreach($category as $tag)
                  <div class="tag" onclick="{{ $company_tag_ids = Helpers::toggleId($tag->id, $company_tag_ids) }}">
                    {{$tag->text}}
                  </div>
                @endforeach
              </div>
            </div>
          @endforeach
          <input type="hidden" id="{{ 'hidden'.$company->id }}" name="{{ 'tags-'.$company->id }}" value="{{$company_tag_ids}}">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>