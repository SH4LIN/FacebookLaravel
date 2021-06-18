@extends('layouts.loginNav')

@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="container-fluid" style="background: #242526"><!-- Main Container For Screen -->
                <div class="row m-0">
                    <div class="container" style="height: 550px;"><!-- Main Container For Rest of The profile Like Profile name -->
                        <div class="row justify-content-center m-0">
                            <div class="container-fluid cover-image mx-5" style="position: relative;"><!-- Main Container For Cover And Profile Image -->
                                <div class="row justify-content-center">
                                    @if($user->profile->coverImage != null)
                                        <img src="{{ __($user->profile->coverImage) }}" alt="Cover Image" class="cover-image" style="object-fit: cover">
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-12 m-0" style="position: absolute;bottom: -15px;">
                                        <div class="row justify-content-center">
                                            <a href="#profileModal" data-toggle="modal">
                                                <img src="{{ __($user->profile->profileImage) }}" alt="Cover Image" style="height: 168px;width: 168px;border-radius: 50%;border: 3px #242526 solid">
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 m-0" style="position: absolute;bottom: 10px;">
                                        <div class="row justify-content-end">
                                            <a id="coverMenu" class="nav-link dropdown-toggle-split" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <div class="container input-button-style" style="background: white;display: flex">
                                                    <div class="row m-0">
                                                        <div class="col-md-1 p-0">
                                                            <div class="row m-0 justify-content-center">
                                                                <i class="material-icons" style="color: black;font-size: 16px" aria-hidden="true">camera_alt</i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-11 mr-0 pr-0 d-none d-xl-block">
                                                    <span style="color: black;word-spacing: 1px">
                                                        <b>
                                                            {{ $action }}
                                                        </b>
                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="coverMenu">
                                                @foreach($menuItems as $key => $val)
                                                    <div class="row dropdown-item m-0 dropdown-item">
                                                        <button class="mdc-button custom-outlined-button" onclick="
                                                        @if($val['action'] == 'addCover')
                                                            {
                                                            document.getElementById('photoCover').click();
                                                            }
                                                        @else
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('{{ $val['action'] }}').submit();
                                                            }
                                                        @endif">

                                                            <i class="material-icons mdc-button__icon label-hide-on-small" aria-hidden="true"
                                                            >{{ $val['icon'] }}</i>
                                                            <span class="mdc-button__label ">{{ $key }}</span>
                                                        </button>
                                                    </div>
                                                    <form id="{{ $val['action'] }}" action="{{ $val['link'] }}" method="POST" class="d-none" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="requestOf" value="{{ $val['action'] }}">
                                                        <input type="file" accept="image/png, image/jpeg" onchange="this.form.submit();" name="photo" id="photoCover" hidden>
                                                    </form>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center my-4">
                            <div class="container-fluid m-0"><!-- Main Container For Name -->
                                <div class="row m-0">
                                    <div class="col-md-12">
                                        <div class="row justify-content-center">
                                            <H1 style="color: #fff"><strong>{{ __($user->firstname." ".$user->lastname) }}</strong></H1>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-md-12">
                                        <div class="row justify-content-center">
                                            @if($user->profile->bio == null)
                                                <a href="#bioModal" data-toggle="modal" style="color: #2E89FF;" class="btn btn-link" >{{ __('Add Bio') }}</a>
                                            @else
                                                <div class="container-fluid m-0">
                                                    <div class="row justify-content-center" style="color: #B0B3B8">
                                                        {{ __($user->profile->bio) }}
                                                    </div>

                                                    <div class="row justify-content-center">
                                                        <a href="#bioModal" data-toggle="modal" style="color: #2E89FF;" class="btn btn-link" >{{ __('Edit Bio') }}</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Code Without Bootstrap -->
                                <!--                        <div class="row mt-3 mx-5" style="height: 7vh">
                            <div class="col-md-6">
                                <ul class="nav nav-pills">
                                    <li class="nav-item m-xl-auto">
                                        <a class="nav-link active" aria-current="page" href="#">{{__('Posts')}}</a>
                                    </li>
                                    <li class="nav-item  m-sm-auto d-sm-none d-md-block d-none d-sm-block">
                                        <a class="nav-link " aria-current="page" href="#">{{__('About')}}</a>
                                    </li>
                                    <li class="nav-item m-xl-auto d-sm-none d-md-block d-none d-sm-block">
                                        <a class="nav-link " aria-current="page" href="#">{{__('Friends')}}</a>
                                    </li>
                                    <li class="nav-item m-xl-auto d-sm-none d-md-block d-none d-sm-block">
                                        <a class="nav-link " aria-current="page" href="#">{{__('Photos')}}</a>
                                    </li>
                                    <li class="nav-item m-xl-auto d-sm-none d-md-block d-none d-sm-block">
                                        <a class="nav-link " aria-current="page" href="#">{{__('Story Archive ')}}</a>
                                    </li>
                                    <li class="nav-item m-xl-auto d-sm-none d-md-block d-none d-sm-block">
                                        <a class="nav-link " aria-current="page" href="#">{{__('Videos')}}</a>
                                    </li>
                                    <li class="nav-item m-xl-auto">
                                        <a class="nav-link " aria-current="page" href="#">{{__('More')}}</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6 pl-2">
                                <div class="row m-0">
                                    <div class="col-md-5">
                                        <div class="container-fluid input-button-style" style="background: #2D88FF;">
                                            <div class="row m-0">
                                                <div class="col-md-3 p-0">
                                                    <div class="row m-0 justify-content-center">
                                                        <i class="material-icons" style="font-size: 16px;color: white" aria-hidden="true">add_circle</i>
                                                    </div>
                                                </div>
                                                <div class="col-md-9 mr-0 pr-0 d-none d-xl-block">
                                                    <span style="color: white;word-spacing: 1px">
                                                        <b>
                                                            {{ __('Add to Story') }}
                                </b>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="container-fluid px- input-button-style" style="background: #FFFFFF1A;">
                    <div class="row m-0">
                        <div class="col-md-3 p-0">
                            <div class="row m-0 justify-content-center">
                                <i class="material-icons" style="color: #E4E6EB;font-size: 16px" aria-hidden="true">edit</i>
                            </div>
                        </div>
                        <div class="col-md-9 mr-0 pr-0 d-none d-xl-block">
                            <span style="color: #E4E6EB;word-spacing: 1px">
                                <b>
{{ __('Edit Profile') }}
                                </b>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="container input-button-style" style="background: #FFFFFF1A;">
                    <div class="row m-0 justify-content-center">
                        <i class="material-icons" style="color: #E4E6EB;font-size: 16px" aria-hidden="true">more_horiz</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--@for($i=0;$i<5;$i++)
            <div class="row mx-0 my-5 justify-content-center">
                <div class="col-md-6">
                    <div class="container-fluid">
                        <div class="card shadow" style="background: #242526">
                            <div class="card-header">
                                <h5 class="card-title card-text" id="exampleModalLongTitle" style="color: white">{{__('Register')}}</h5>
                            </div>
                            <div class="card-body p-0" style="background: #242526">
                                <img class="card-img-top" src="{{ $user->profile->profileImage }}" style="max-height: 350px;width: 100%;object-fit: cover">
                            </div>
                            <div class="card-footer">
                               <div class="col-4">
                                    <div class="container-fluid input-button-style" style="background: #2D88FF;">
                                        <div class="row m-0">
                                            <div class="col-md-3 p-0">
                                                <div class="row m-0 justify-content-center">
                                                    <i class="material-icons" style="font-size: 16px;color: white" aria-hidden="true">add_circle</i>
                                                </div>
                                            </div>
                                            <div class="col-md-9 mr-0 pr-0 d-none d-xl-block">
                                                <span style="color: white;word-spacing: 1px">
                                                    <b>
                                                        {{ __('Add to Story') }}
                                                    </b>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="container-fluid input-button-style" style="background: #2D88FF;">
                                        <div class="row m-0">
                                            <div class="col-md-3 p-0">
                                                <div class="row m-0 justify-content-center">
                                                    <i class="material-icons" style="font-size: 16px;color: white" aria-hidden="true">add_circle</i>
                                                </div>
                                            </div>
                                            <div class="col-md-9 mr-0 pr-0 d-none d-xl-block">
                                                <span style="color: white;word-spacing: 1px">
                                                    <b>
                                                        {{ __('Add to Story') }}
                                                    </b>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="container-fluid input-button-style" style="background: #2D88FF;">
                                        <div class="row m-0">
                                            <div class="col-md-3 p-0">
                                                <div class="row m-0 justify-content-center">
                                                    <i class="material-icons" style="font-size: 16px;color: white" aria-hidden="true">add_circle</i>
                                                </div>
                                            </div>
                                            <div class="col-md-9 mr-0 pr-0 d-none d-xl-block">
                                                <span style="color: white;word-spacing: 1px">
                                                    <b>
                                                        {{ __('Add to Story') }}
                                                    </b>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor--}}

    </div>


    <!-- Modals-->
    <div class="modal fade" id="bioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('Bio')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('bioEdit') }}" method="post" class="form">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group row m-0 justify-content-center">
                            <label class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea mdc-text-field--no-label">
                                <span class="mdc-notched-outline">
                                    <span class="mdc-notched-outline__leading"></span>
                                    <span class="mdc-notched-outline__trailing"></span>
                                </span>
                                <span class="mdc-text-field__resizer">
                                    <textarea class="mdc-text-field__input" rows="6" cols="30" aria-label="Tell us about yourself" name="bio">{{ __($user->profile->bio) }}</textarea>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Save changes">
                    </div>
                </form>


            </div>
        </div>
    </div>

    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @foreach($profileMenuItems as $key => $val)
                        <div class="row dropdown-item m-0 dropdown-item">
                            <button class="mdc-button custom-outlined-button" onclick="
                            @if($val['action'] == 'addProfile')
                                {
                                document.getElementById('photoProfile').click();
                                }
                            @else
                                {
                                event.preventDefault();
                                document.getElementById('{{ $val['action'] }}').submit();
                                }
                            @endif">

                                <i class="material-icons mdc-button__icon label-hide-on-small" aria-hidden="true"
                                >{{ $val['icon'] }}</i>
                                <span class="mdc-button__label ">{{ $key }}</span>
                            </button>
                        </div>
                        <form id="{{ $val['action'] }}" action="{{ $val['link'] }}" method="POST" class="d-none" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="requestOf" value="{{ $val['action'] }}">
                            <input type="file" accept="image/png, image/jpeg" onchange="this.form.submit();" name="photo" id="photoProfile" hidden>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
