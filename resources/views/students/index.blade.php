@extends('layout')

@section('title')
    All Students
@endsection
<div class="d-none">{{ $x = 1 }}</div>
@section('content')
    <a class="btn btn-outline-primary my-5 mx-5 " href="{{ route('students.create') }}">Create new Student</a>


    <div class="search-box">
        <div class="row g-3 align-items-center w-100 justify-content-center">
            <div class="col-auto search-input-box">
                <input type="search" id="keyword" placeholder="Type To Search" aria-describedby="search" onkeyup="search()">
                <label for="keyword" class="col-form-label"><i class="fa-solid fa-magnifying-glass"
                        style="color: #ff0044;"></i></label>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Birth Date</th>
                </tr>
            </thead>
            <tbody id="student-cont">
                @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $x }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->code }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->level_id }}</td>
                        <td>{{ $student->date }}</td>
                    </tr>
                    <div class="d-none">{{ $x++ }}</div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('script')
    <script>
        const search = () => {
            const key = document.getElementById("keyword").value;
            // console.log(key)
            let url = "{{ route('students.search') }}" + "?keyword=" + key;
            // console.log(url)
            let myrequest = new XMLHttpRequest();
            myrequest.open("GET", url)
            myrequest.send();
            myrequest.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {

                    let Data = JSON.parse(this.responseText);
                    let cont = document.getElementById('student-cont');
                    cont.replaceChildren();

                    let x = 1;
                    for (student of Data) {
                        let tr = document.createElement('tr');
                        // bigBox.classList.add("prod-col-cont");
                        let th = document.createElement('th');
                        th.setAttribute("scope", "row");
                        let th_Content = document.createTextNode(x);
                        th.appendChild(th_Content)


                        let td_name = document.createElement('td');
                        let name_Content = document.createTextNode(student.name);
                        td_name.appendChild(name_Content)

                        let td_code = document.createElement('td');
                        let code_Content = document.createTextNode(student.code);
                        td_code.appendChild(code_Content)

                        let td_email = document.createElement('td');
                        let email_content = document.createTextNode(student.email);
                        td_email.appendChild(email_content)

                        let td_level_id = document.createElement('td');
                        let level_id_content = document.createTextNode(student.level_id);
                        td_level_id.appendChild(level_id_content)

                        let td_birthDate = document.createElement('td');
                        let birthDate_content = document.createTextNode(student.date);
                        td_birthDate.appendChild(birthDate_content)

                        tr.appendChild(th)
                        tr.appendChild(td_name)
                        tr.appendChild(td_code)
                        tr.appendChild(td_email)
                        tr.appendChild(td_level_id)
                        tr.appendChild(td_birthDate)

                        cont.appendChild(tr);
                        x++;

                    }

                }
            }
        }
    </script>
@endsection





{{-- <div class="d-flex justify-content-evenly align-items-center">
                        <a class="btn btn-info mx-3" href="{{ route('students.show', $student->id) }}">View</a>
                        <a class="btn btn-success mx-3" href="{{ route('students.edit', $student->id) }}">Update</a>
                        <a class="btn btn-danger mx-3" href="{{ route('students.delete', $student->id) }}">Delete</a>
                    </div> --}}
