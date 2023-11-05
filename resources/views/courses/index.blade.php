@extends('layout')

@section('title')
    All Courses
@endsection
<div class="d-none">{{ $x = 1 }}</div>
@section('content')
    <div class="search-box my-5">
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
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody id="courses-cont">
                @foreach ($courses as $course)
                    <tr class="table-warning">

                        <th scope="row">{{ $x }}</th>
                        <td><a href="{{ route('courses.show', $course->id) }}"> {{ $course->name }} </a></td>
                        <td>{{ $course->code }}</td>
                        <td>{{ $course->description }}</td>

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
            let url = "{{ route('courses.search') }}" + "?keyword=" + key;
            // console.log(url)
            let myrequest = new XMLHttpRequest();
            myrequest.open("GET", url)
            myrequest.send();
            myrequest.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {

                    let Data = JSON.parse(this.responseText);
                    let cont = document.getElementById('courses-cont');
                    cont.replaceChildren();

                    let x = 1;
                    for (course of Data) {
                        let tr = document.createElement('tr');
                        tr.setAttribute("class", "table-warning");
                        // bigBox.classList.add("prod-col-cont");
                        let th = document.createElement('th');
                        th.setAttribute("scope", "row");
                        let th_Content = document.createTextNode(x);
                        th.appendChild(th_Content)


                        let td_name = document.createElement('td');
                        let link = document.createElement('a');
                        // let link_Content = document.createTextNode(course.name);
                        link.setAttribute("href", `http://localhost/students/public/courses/show/${course.id})`);
                        // link.setAttribute("class", "link-style");
                        let linkText = document.createTextNode(course.name);
                        link.appendChild(linkText);
                        td_name.appendChild(link)

                        let td_code = document.createElement('td');
                        let code_Content = document.createTextNode(course.code);
                        td_code.appendChild(code_Content)

                        let td_description = document.createElement('td');
                        let description_content = document.createTextNode(course.description);
                        td_description.appendChild(description_content)


                        tr.appendChild(th)
                        tr.appendChild(td_name)
                        tr.appendChild(td_code)
                        tr.appendChild(td_description)


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
