<ul>
    @foreach ($children as $child)
        <li>
            @if (count($child->children))
                <i class="glyphicon glyphicon-plus-sign" aria-hidden="true"></i>
                {{ $child->title }}
                @include('category.children', ['children' => $child->children])
            @else
                {{ $child->title }}
            @endif
        </li>
    @endforeach
</ul>
