@extends('layout.main')

@push('title')
    All Students
@endpush

@section('main-section')
    <div class="container mt-2">
        <h2 class="text-justify text-center"><a href="/stuHome" style="text-decoration: none;">All Students List</a></h2>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-hover bg-dark text-light">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Institute</th>
                                <th>Institute Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (isset($id))
                                @foreach ($students as $student)
                                    @if ($student->studentid == $id)
                                        <form action="{{ url('/') }}/stuEdit/{{ $id }}" method="post">
                                            @csrf
                                            <tr>
                                                <th scope="row">{{ $student->studentid }}</th>
                                                <td><input type="text" value="{{ $student->name }}" name="stuname"
                                                        size="10" /></td>
                                                <td><input type="email" value="{{ $student->email }}" name="stuemail"
                                                        size="10" disabled /></td>
                                                <input type="password" value="{{ $student->password }}" name="stupass"
                                                    hidden>
                                                <td><input type="text" value="{{ $student->address }}" name="stuadd"
                                                        size="10" /></td>
                                                <td><input type="text" value="{{ $student->institute }}"
                                                        name="stuinstitute" size="10" /></td>
                                                <td><input type="text" value="{{ $student->instituteaddress }}"
                                                        name="stuInsAdd" size="10" /></td>
                                                <td><input type="submit" value="Save" class="btn btn-success"></td>
                                            </tr>
                                        </form>
                                    @else
                                        <tr>
                                            <th scope="row">{{ $student->studentid }}</th>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->institute }}</td>
                                            <td>{{ $student->instituteaddress }}</td>
                                            <td>
                                                <a href="/stuEdit/{{ $student->studentid }}"
                                                    class="btn btn-success">Edit</a>
                                                <a href="/stuDel/{{ $student->studentid }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($students as $student)
                                    <tr>
                                        <th scope="row">{{ $student->studentid }}</th>
                                        <td title="Click To Show Details" style="cursor: pointer;" onclick="showName(this,'name_{{$student->studentid}}')">{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td title="Click To Show Address" style="cursor: pointer;" onclick="showAddress(this,'addr_{{$student->studentid}}')">{{ $student->address }}</td>
                                        <td>{{ $student->institute }}</td>
                                        <td>{{ $student->instituteaddress }}</td>
                                        <td>
                                            <a href="/stuEdit/{{ $student->studentid }}" class="btn btn-success">Edit</a>
                                            <a href="/stuDel/{{ $student->studentid }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @if ($student->getStudentAddresses->count() > 0)
                                        <tr style="background: gray; color:black; display: none;" id="addr_{{$student->studentid}}">
                                            <td colspan="7">
                                                <b>Student Addresses:</b>
                                                @foreach ($student->getStudentAddresses as $address)
                                                    <p>{{ $address->addr }}</p>
                                                @endforeach

                                            </td>
                                        </tr>
                                    @endif
                                    @if ($student->getStudentpersonaldetails)
                                        <tr style="background: gray; color:black; display: none;" id="name_{{$student->studentid}}">
                                            <td colspan="7">
                                                <b>Personal Details:</b>

                                                <p>Father's Name:
                                                    {{ $student->getStudentpersonaldetails->father_name }}</p>
                                                <p>Mother's Name:
                                                    {{ $student->getStudentpersonaldetails->mothername }}</p>
                                                <p>Date of Birth: {{ $student->getStudentpersonaldetails->dob }}</p>
                                                <p>Mobile: {{ $student->getStudentpersonaldetails->mobile }}</p>

                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showName(element,id) {
            let e=document.getElementById(id);
            if(e==null)
                console.log("not present");
            else
                e.style.display=e.style.display==="revert"?"none":"revert";
        }
        function showAddress(element,id) {
            let e=document.getElementById(id);
            if(e==null)
                console.log("not present");
            else
                e.style.display=e.style.display==="revert"?"none":"revert";
        }
    </script>
@endsection
