@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 order-sm-2">
                    <h1 class="m-0 float-right">التصرف في القاعات</h1>
                </div><!-- /.col -->


                <div class="col-sm-6 order-sm-1">
                    <ol class="breadcrumb float-right float-sm-left">
                        <li class="breadcrumb-item active order-sm">التصرف في القاعات</li>
                        <li class="breadcrumb-item"><a href="#">الصفحة الرئيسية</a></li>
                    </ol>
                </div><!-- /.col -->



            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h2 class="col-md-6 offset-md-2  order-md-2 text-right">القاعات</h2>
                                <button type="button"
                                    class="btn btn-block bg-gradient-primary offset-md-1 col-md-2 order-md-1 mt-sm-2"
                                    data-toggle="modal" data-target="#exampleModal">
                                    إضافة قاعة
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title w-100" id="exampleModalLabel">إضافة قاعة</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action='{{ route('salle.store') }}' width=60%>
                                                    @csrf


                                                    <div class="form-group text-right">
                                                        <label for="libelle"><span class="text-danger">*</span>
                                                            الإسم</label>
                                                        <input type="text" class="form-control text-right" id="libelle"
                                                            name="libelle" placeholder="أدخل الإسم" required>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-secondary"
                                                    data-dismiss="modal">إلغاء</button>
                                                <button type="submit" class="btn btn-primary">تأكيد</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="p-3">
                            <table id="example1" class="table table-bordered table-striped text-right p-3">
                                <thead>
                                    <tr>
                                        <th width="25%">العملية</th>
                                        <th>الاسم</th>
                                        <th width="5%">العدد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $key => $salle)
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route("salle.delete", $salle->id) }}"
                                                    class="btn btn-danger offset-sm-3 mr-sm-1 col-sm-4 order-3 order-sm-1"
                                                    id="delete">حذف</a>

                                                <button type="button" class="btn btn-info  col-sm-4 order-2"
                                                    data-toggle="modal" data-target="#model{{$salle->id}}">
                                                    تحديث
                                                </button>
                                            </div>
                                        </td>
                                        <td>{{ $salle->libelle }}</td>
                                        <td>{{ $key+1 }}</td>
                                    </tr>
                                    @endforeach
                                    </tfoot>
                            </table>



                            @foreach ($allData as $key => $salle)

                            <!-- Modal -->
                            <div class="modal fade" id="model{{$salle->id}}" tabindex="1"
                                aria-labelledby="exampleModal{{$salle->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title w-100" id="exampleModalLabel">تحديث القاعة</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action='{{ route('salle.miseajour',$salle->id) }}'
                                                width=60%>
                                                @csrf


                                                <div class="form-group text-right">
                                                    <label for="libelle text-right"><span class="text-danger">*</span>
                                                        الإسم</label>
                                                    <input type="text" class="form-control text-right" id="libelle"
                                                        name="libelle" placeholder="أدخل الإسم"
                                                        value="{{ $salle->libelle }}" required>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary"
                                                data-dismiss="modal">إلغاء</button>
                                            <button type="submit" class="btn btn-primary">تأكيد</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            @endforeach



                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('datatable')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": [{
                    extend: 'copy',
                    text: 'نسخ',
                    exportOptions: {
                        columns: [
                            '1:visIdx',
                            '2:visIdx'
                        ]
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        columns: [
                            '1:visIdx',
                            '2:visIdx'
                        ]
                    }
                }, "pdf",
                {
                    extend: 'print',
                    text: 'طباعة',
                    exportOptions: {
                        columns: [
                            '1:visIdx',
                            '2:visIdx'
                        ]
                    }
                }, {
                    extend: 'colvis',
                    text: 'رؤية الأعمدة'
                }
            ],

            "language": {
                "emptyTable": "ليست هناك بيانات متاحة في الجدول",
                "loadingRecords": "جارٍ التحميل...",
                "lengthMenu": "أظهر _MENU_ مدخلات",
                "zeroRecords": "لم يعثر على أية سجلات",
                "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "infoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "infoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "search": "ابحث:",
                "paginate": {
                    "first": "الأول",
                    "previous": "السابق",
                    "next": "التالي",
                    "last": "الأخير"
                },
                "aria": {
                    "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
                },
                "select": {
                    "rows": {
                        "_": "%d قيمة محددة",
                        "1": "1 قيمة محددة"
                    },
                    "cells": {
                        "1": "1 خلية محددة",
                        "_": "%d خلايا محددة"
                    },
                    "columns": {
                        "1": "1 عمود محدد",
                        "_": "%d أعمدة محددة"
                    }
                },
                "buttons": {
                    "print": "طباعة",
                    "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                    "copySuccess": {
                        "_": "%d قيمة نسخت",
                        "1": "1 قيمة نسخت"
                    },
                    "pageLength": {
                        "-1": "اظهار الكل",
                        "_": "إظهار %d أسطر"
                    },
                    "collection": "مجموعة",
                    "copy": "نسخ",
                    "copyTitle": "نسخ إلى الحافظة",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pdf": "PDF",
                    "colvis": "إظهار الأعمدة",
                    "colvisRestore": "إستعادة العرض"
                },
                "autoFill": {
                    "cancel": "إلغاء",
                    "fill": "املأ جميع الحقول بـ <i>%d&lt;\\\/i&gt;<\/i>",
                    "fillHorizontal": "تعبئة الحقول أفقيًا",
                    "fillVertical": "تعبئة الحقول عموديا"
                },
                "searchBuilder": {
                    "add": "اضافة شرط",
                    "clearAll": "ازالة الكل",
                    "condition": "الشرط",
                    "data": "المعلومة",
                    "logicAnd": "و",
                    "logicOr": "أو",
                    "title": [
                        "منشئ البحث"
                    ],
                    "value": "القيمة",
                    "conditions": {
                        "date": {
                            "after": "بعد",
                            "before": "قبل",
                            "between": "بين",
                            "empty": "فارغ",
                            "equals": "تساوي",
                            "not": "ليس",
                            "notBetween": "ليست بين",
                            "notEmpty": "ليست فارغة"
                        },
                        "number": {
                            "between": "بين",
                            "empty": "فارغة",
                            "equals": "تساوي",
                            "gt": "أكبر من",
                            "gte": "أكبر وتساوي",
                            "lt": "أقل من",
                            "lte": "أقل وتساوي",
                            "not": "ليست",
                            "notBetween": "ليست بين",
                            "notEmpty": "ليست فارغة"
                        },
                        "string": {
                            "contains": "يحتوي",
                            "empty": "فاغ",
                            "endsWith": "ينتهي ب",
                            "equals": "يساوي",
                            "not": "ليست",
                            "notEmpty": "ليست فارغة",
                            "startsWith": " تبدأ بـ "
                        }
                    },
                    "button": {
                        "0": "فلاتر البحث",
                        "_": "فلاتر البحث (%d)"
                    },
                    "deleteTitle": "حذف فلاتر"
                },
                "searchPanes": {
                    "clearMessage": "ازالة الكل",
                    "collapse": {
                        "0": "بحث",
                        "_": "بحث (%d)"
                    },
                    "count": "عدد",
                    "countFiltered": "عدد المفلتر",
                    "loadMessage": "جارِ التحميل ...",
                    "title": "الفلاتر النشطة"
                },
                "infoThousands": ",",
                "datetime": {
                    "previous": "السابق",
                    "next": "التالي",
                    "hours": "الساعة",
                    "minutes": "الدقيقة",
                    "seconds": "الثانية",
                    "unknown": "-",
                    "amPm": [
                        "صباحا",
                        "مساءا"
                    ],
                    "weekdays": [
                        "الأحد",
                        "الإثنين",
                        "الثلاثاء",
                        "الأربعاء",
                        "الخميس",
                        "الجمعة",
                        "السبت"
                    ],
                    "months": [
                        "يناير",
                        "فبراير",
                        "مارس",
                        "أبريل",
                        "مايو",
                        "يونيو",
                        "يوليو",
                        "أغسطس",
                        "سبتمبر",
                        "أكتوبر",
                        "نوفمبر",
                        "ديسمبر"
                    ]
                },
                "editor": {
                    "close": "إغلاق",
                    "create": {
                        "button": "إضافة",
                        "title": "إضافة جديدة",
                        "submit": "إرسال"
                    },
                    "edit": {
                        "button": "تعديل",
                        "title": "تعديل السجل",
                        "submit": "تحديث"
                    },
                    "remove": {
                        "button": "حذف",
                        "title": "حذف",
                        "submit": "حذف",
                        "confirm": {
                            "_": "هل أنت متأكد من رغبتك في حذف السجلات %d المحددة؟",
                            "1": "هل أنت متأكد من رغبتك في حذف السجل؟"
                        }
                    },
                    "error": {
                        "system": "حدث خطأ ما"
                    },
                    "multi": {
                        "title": "قيم متعدية",
                        "restore": "تراجع"
                    }
                },
                "processing": "جارٍ المعالجة..."
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });

</script>
@endsection