<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item {{setActiveClass('dashboard.index')}}">
            @if(setActiveClass('dashboard.index') == 'active')
                Home
            @else
                <a href="{{adminRoute('dashboard.index')}}">Home</a>
            @endif
        </li>

        @if(!empty($list))
            @foreach($list as $oneBreadCrump)
                <li class="breadcrumb-item {{setActiveClass($oneBreadCrump['route'])}}">
                    @if(setActiveClass($oneBreadCrump['route'],false) == 'active')
                        {{$oneBreadCrump['title']}}
                    @else
                        <a href="{{ adminRoute($oneBreadCrump['route'])}}">{{$oneBreadCrump['title']}}</a>
                    @endif
                </li>
            @endforeach
        @endif
    </ol>
</nav>
