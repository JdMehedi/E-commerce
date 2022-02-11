@include('layout.beforeSearchMaster')

<div class="social clear">
    <div class="searchbtn clear">

    </div>
</div>



@include('layout.afterSearchMasterUserAdmin')



<link href="{{asset('userDetails/css/style.css')}}" rel="stylesheet" type="text/css" />





<div class="features_area section_gap_change">

                    <span class="contact100-form-title-1">
                       User Details List
                    </span>

    <div class="containerChange">

        <div class="col-12Change2">
            <a class="primary-btn text-uppercase"  href="{{url('userDetails/add')}}">Add User Details</a>
        </div>

        <div class="col-12Change1">
            <a class="primary-btn text-uppercase"  href="{{url('users')}}">User List</a>
        </div>
        <div class="table-scrollable" >
            <table class="responstable" id="sample_1">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Address</th>
                    <th>Department</th>
                    <th>Degree</th>
                    <th>Contact Number</th>
                    <th>Room No.</th>
                    <th>Block</th>
                    <th>Boarder Type</th>
                    <th>Birth Date</th>
                    <th>Gender</th>
                    <th>Religion</th>
                    <th>District</th>
                    <th>Blood Group</th>
                    <th>Photo</th>
                    <th>ACTION</th>
                </tr>
                </thead>

                @if(isset($userDetails[0]))
                    @foreach($userDetails as $user)

                        <tr>
                            <th>{{$user->id}}</th>
                            <th>{{$user->pstudent_id}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->fname}}</th>
                            <th>{{$user->mname}}</th>
                            <th>{{$user->address}}</th>
                            <th>{{$user->department}}</th>
                            <th>{{$user->degree}}</th>
                            <th>{{$user->cnumber}}</th>
                            <th>{{$user->roomno}}</th>
                            <th>{{$user->block}}</th>
                            <th>{{$user->btype}}</th>
                            <th>{{$user->birth_date}}</th>
                            <th>{{$user->gender}}</th>
                            <th>{{$user->religion}}</th>
                            <th>{{$user->districts}}</th>
                            <th>{{$user->blood_group}}</th>
                            <th>
                                @if(!empty($user->photo))
                                    <img width="100" src="{{asset('/uploads/personalPhotos/'.$user->photo)}}"  alt="">
                                @endif

                            </th>

                            <th>
                                <a href="{{url('userDetails/edit').'?id='.$user->id}}">Edit /</a>
                                <a href="{{url('userDetails/delete').'?id='.$user->id}}">Delete</a>
                            </th>
                        </tr>

                    @endforeach
                @endif

            </table>
        </div>
    </div>
</div>


@include('layout.beforePagination')

@include('layout.afterPagination')

