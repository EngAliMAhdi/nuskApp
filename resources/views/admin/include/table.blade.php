@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>Authors table</h6>
                </div>
                <div class="px-0 pt-0 pb-2 card-body">
                    <div class="p-0 table-responsive">
                        <table class="table mb-0 align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Function</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Employed</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                    alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">John Michael</h6>
                                                <p class="mb-0 text-xs text-secondary">john@creative-tim.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-xs font-weight-bold">Manager</p>
                                        <p class="mb-0 text-xs text-secondary">Organization</p>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="text-xs text-secondary font-weight-bold">23/04/18</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-xs text-secondary font-weight-bold"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3"
                                                    alt="user2">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Alexa Liras</h6>
                                                <p class="mb-0 text-xs text-secondary">alexa@creative-tim.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-xs font-weight-bold">Programator</p>
                                        <p class="mb-0 text-xs text-secondary">Developer</p>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="text-xs text-secondary font-weight-bold">11/01/19</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-xs text-secondary font-weight-bold"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3"
                                                    alt="user3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Laurent Perrier</h6>
                                                <p class="mb-0 text-xs text-secondary">laurent@creative-tim.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-xs font-weight-bold">Executive</p>
                                        <p class="mb-0 text-xs text-secondary">Projects</p>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="text-xs text-secondary font-weight-bold">19/09/17</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-xs text-secondary font-weight-bold"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="../assets/img/team-3.jpg" class="avatar avatar-sm me-3"
                                                    alt="user4">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Michael Levi</h6>
                                                <p class="mb-0 text-xs text-secondary">michael@creative-tim.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-xs font-weight-bold">Programator</p>
                                        <p class="mb-0 text-xs text-secondary">Developer</p>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="text-xs text-secondary font-weight-bold">24/12/08</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-xs text-secondary font-weight-bold"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                    alt="user5">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Richard Gran</h6>
                                                <p class="mb-0 text-xs text-secondary">richard@creative-tim.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-xs font-weight-bold">Manager</p>
                                        <p class="mb-0 text-xs text-secondary">Executive</p>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="text-xs text-secondary font-weight-bold">04/10/21</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-xs text-secondary font-weight-bold"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1 d-flex">
                                            <div>
                                                <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3"
                                                    alt="user6">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Miriam Eric</h6>
                                                <p class="mb-0 text-xs text-secondary">miriam@creative-tim.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-xs font-weight-bold">Programtor</p>
                                        <p class="mb-0 text-xs text-secondary">Developer</p>
                                    </td>
                                    <td class="text-sm text-center align-middle">
                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="text-xs text-secondary font-weight-bold">14/09/20</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-xs text-secondary font-weight-bold"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
