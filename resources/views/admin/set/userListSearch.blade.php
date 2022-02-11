@include('layout.beforeSearchMaster')

<div class="social clear">
    <div class="searchbtn clear">

    </div>
</div>


@include('layout.afterSearchMasterUserAdmin')





<div class="features_area section_gap_change">





                    <span class="contact100-form-title-1">
                       User List
                    </span>

    <div class="containerChange">


        <div class="col-12Change2">
            <a class="primary-btn text-uppercase"  href="{{url('users/add')}}">Add User</a>
        </div>

        <div class="col-12Change1">
            <a class="primary-btn text-uppercase"  href="{{url('uDetails')}}">User Details List</a>
        </div>


        <table class="responstable">

            <tr>
                <th>ID</th>
                <th>Student Id</th>
                <th>Username</th>
                <th>EMAIL</th>
                <th>Amount</th>
                <th>User Type</th>
                <th>ACTION</th>
            </tr>


            @if(isset($users[0]))
                @foreach($users as $user)

                    <tr>
                        <th>{{$user->id}}</th>
                        <th>{{$user->student_id}}</th>
                        <th>{{$user->username}}</th>
                        <th>{{$user->email}}</th>
                        <th>{{$user->amount}}</th>
                        @if($user->userType==1)
                            <th>Admin</th>
                        @else
                            <th>User</th>
                        @endif

                        <th>
                            <a href="{{url('users/edit').'?id='.$user->id}}">Edit /</a>
                            <a href="{{url('users/delete').'?id='.$user->id}}">Delete</a>
                        </th>
                    </tr>

                @endforeach
            @endif

        </table>

    </div>
</div>






@include('layout.afterPagination')

