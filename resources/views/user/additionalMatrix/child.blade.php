<?php
$levelStop=3;
$startLevel++;
?>
<ul>
  <?php
  $b=0;
  $perb=4;
  $total=count($childs);
  ?>
  @foreach($childs as $child)
  <li>
    <a href="{{ route('addMatrix4x3.find',$child->positionId) }}" style="color: blue">
      <div class="container-fluid">
        <div class="text-center" >
          <i class="fa fa-user fa-2x user-icon"></i>
        </div>
        <div class="text-center">
          {{ $child->user->user_name}} 
        </div>
        
        
      </div>
    </a>
    <?php
    $chaildUsers=\App\Helper\Helper::membersFourIntoThree($child->positionId);
    ?>
    @if(count($chaildUsers)>0)
      @if($startLevel==$levelStop)
      @else
      @include('user.additionalMatrix.child',['childs' => $chaildUsers,'myReferl'=>$myReferl])
      @endif
      @else
      @if($startLevel==$levelStop)
      @else
      @include('user.additionalMatrix.allNull',['user' => $child->positionId])
      @endif
    @endif
    <?php
    $b++;
    ?>
  </li>
  @endforeach
  @for(;$b<$perb;$b++)
  @include('user.additionalMatrix.null',['user' => $child->placement])
  @endfor
</ul>
