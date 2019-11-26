@foreach($breadcrumbs as $breadcrumb)
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="{{ isset($breadcrumb['link']) ? $breadcrumb['link'] : '#' }}" class="kt-subheader__breadcrumbs-link">
        {{ $breadcrumb['text'] }} </a>
@endforeach
