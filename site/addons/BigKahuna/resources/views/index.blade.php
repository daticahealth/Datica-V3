@extends('layout')

@section('content')

    <bkmenulist inline-template>

        <div id="bigkahuna">

            <div class="flex items-center mb-3">
                <h1 class="w-full text-center mb-2 md:mb-0 md:text-left md:w-auto md:flex-1">Menus</h1>
                <a href="{{ route('addons.menu_editor.create') }}" class="btn btn-primary">Create Menu</a>
            </div>

            <div class="card flush">
                <div class="dossier-table-wrapper">
                    <table class="dossier">
                        <tbody>

                            @foreach ($menus as $menu)

                                @if (substr( $menu, 0, 1 ) !== ".")

                                    <tr>
                                        <td class="cell-title first-cell">
                                            <span class="column-label">Title</span>
                                            <a href="{{ route('addons.menu_editor.edit', $menu) }}" title="Edit {{ ucwords(str_replace('-', ' ', $menu)) }}">
                                                {{ ucwords(str_replace('-', ' ', $menu)) }}
                                            </a>
                                        </td>

                                        <td class="cell-slug">
                                            <span class="column-label">Tag</span>
                                            <span v-pre>
                                                <code>&lcub;&lcub; big_kahuna menu="{{ $menu }}" &rcub;&rcub;</code>
                                            </span>
                                        </td>

                                        <td class="column-actions">
                                            <div class="btn-group action-more">
                                                <button type="button" class="btn-more dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon icon-dots-three-vertical"></i> </button>
                                                <ul class="dropdown-menu">
                                                    <li class="warning" @click="deleteMenu('{{ $menu }}')">
                                                        <a href="#" title="Delete this menu">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                @endif

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </bkmenulist>

@endsection
