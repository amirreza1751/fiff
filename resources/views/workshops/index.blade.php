@extends('layouts.app')

@section('content')
    <div class="container">
<h2 class="text-center" >ورکشاپ ها</h2>
        <a class="btn btn-info" href="/home">بازگشت</a>
        <a class="btn btn-primary" href="/workshops/add">افزودن ورکشاپ</a>
        <br>
        <br>
        <input id="myInput" class="form-control container" type="text" placeholder=" جستجو کنید ..." style="direction: rtl">
        <br>
        @if(Session::has('message'))
            <p class="text-right alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif


            <table class="table table-striped table-responsive-xl table-bordered text-center" style="box-shadow: 5px 10px 35px #3e3e3e; text-align: right; direction: rtl">
                <thead class="table-dark">
                <tr>
                    <th scope="row">ردیف</th>
                    <th >عنوان ورکشاپ</th>
                    <th>دسته بندی</th>
                    <th>نام مدرس</th>
                    <th>اطلاعات مدرس</th>
                    <th>توضیحات</th>
                    <th>کشور مدرس</th>
                    <th>دوره</th>
                    <th>عکس ها</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                    <th>ویژه ها</th>
                </tr>
                </thead>
                <tbody id="myTable">

                @foreach($workshops as $workshop)
                    <tr>
                        <td>{{++$loop->index}}</td>
                        <td>{{$workshop->subject_fa}}</td>
                        <td>{{$workshop->category_fa}}</td>
                        <td>{{$workshop->teacher_name_fa}}</td>
                        <td>{{$workshop->teacher_info_fa}}</td>
                        <td>{{$workshop->text_fa}}</td>
                        <td>{{$workshop->country_fa}}</td>
                        <td>{{$workshop->festival_number}}</td>
                        <td><a href="/workshops/pics/{{$workshop->id}}">عکس ها</a> </td>
                        <td>
                            <span style="font-size: 23px; color: black;">
                               <a href="/workshops/edit/{{$workshop->id}}" style="color: black ;">
                                  <i class="far fa-edit"></i>
                               </a>
                             </span>
                        </td>
                        <td>
                            <span style="font-size: 23px; color: black;">
                                <a class="deleteCourse" href="#" data-courseid="{{$workshop->id}}" id="deleteID" data-target="#myModal" data-toggle="modal" style="color: black ;">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                             </span>
                        </td>
                        <td>
                            <span style="font-size: 23px; color: black;">
                                <a href="/workshops/special/{{$workshop->id}}"  style="color: @if($workshop->special==1){{'red'}} @else {{'black'}} @endif;">
                                    <i class="far fa-star"></i>
                                </a>
                             </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        <div class="pagination justify-content-center">{{ $workshops->links() }}</div>

    </div>



    <!-- The Delete Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" style="float: right">حذف ورکشاپ</h5>
                    <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="text-align: right">
                    آیا از حذف کردن ورکشاپ مطمئن هستید؟
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    {{--<button href="delete/{{$course->id}}" type="button" class="btn btn-success btn-link" data-dismiss="modal">بله</button>--}}
                    <a href="" id="modalDeleteButton" class="btn waves-effect btn-block btn-success text-white">بله</a><br>
                    <button type="button" class="btn btn-block btn-danger waves-effect" data-dismiss="modal">خیر</button>
                </div>

            </div>
        </div>
    </div>

    <!-- End Delete Modal -->


    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(document).on('click','.deleteCourse',function(){
            var courseID=$(this).attr('data-courseid');
            var courseIDhref = "workshops/delete/"+ courseID;
            $('#modalDeleteButton').attr("href", courseIDhref);
        });
    </script>
@endsection