@if ($breadcrumbs)
<ul class="page-breadcrumb breadcrumb">
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!$breadcrumb->last)
            @if(!$breadcrumb->first)
            <li>
                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                <i class="icon-angle-right"></i>
            </li>
            @else
            <li>
                <i class="icon-home"></i>
                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                <i class="icon-angle-right"></i>
            </li>
            @endif
        @else
            <li><a href="javascript:void(0)">{{ $breadcrumb->title }}</a></li>
        @endif
    @endforeach
</ul>
@endif
