<?php

use App\Http\Controllers\EmpBankController;
use App\Http\Controllers\EmpDocController;
use App\Http\Controllers\ESIController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\PreviousEmploymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\PFController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\GoalTrackingController;
use App\Http\Controllers\PromotionController;   
use App\Http\Controllers\TrainingTypeController;  
use App\Http\Controllers\TrainerController;  
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TerminationController;
use App\Http\Controllers\ResignationController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes  
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/user-info',[ProfileController::class,'userUpdate'])->name('userUpdate');
    Route::post('/check-in', [AttendanceController::class, 'checkIn'])->name('checkIn');
    Route::post('/check-out', [AttendanceController::class, 'checkOut'])->name('checkOut');

    // Employee Leave
    Route::get('/my-leave-record', [LeaveController::class, 'index'])->name('my.leave.record');
    Route::post('/apply/leave/store', [LeaveController::class, 'applyLeave'])->name('apply.leave.store');
    Route::get('/designation/edit/{id}', [LeaveController::class, 'adminDesignationEdit'])->name('admin.designation.edit');
    Route::POST('/designation/{id}/update', [LeaveController::class, 'adminDesignationUpdate'])->name('admin.designation.update');
    Route::delete('/designation/delete/{id}', [LeaveController::class, 'adminDesignationDelete'])->name('admin.designation.delete');
});


// Group routes for admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/profile', [DashboardController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/employee/info/profile', [EmployeeController::class, 'adminInfoProfile'])->name('admin.info.profile');
    Route::get('/employee/info/family_details', [EmployeeController::class, 'adminFamilyDetails'])->name('admin.info.family_details');
    Route::post('/employees/family/details', [EmployeeController::class, 'searchFamilyDetails'])->name('search.family_details');
    Route::post('/employees/family/details/store', [FamilyController::class, 'storeFamilyDetails'])->name('store.family_details');
    Route::get('/get/emp_id', [FamilyController::class, 'getEmpId'])->name('getEmpId');

    // Pay Salary
    Route::post('/employee/{employee}/create-account', [PaymentController::class, 'createConnectedAccount'])->name('account.create');
    Route::post('/employee/{employee}/add-bank-account', [PaymentController::class, 'addBankAccount'])->name('add.bank.account');
    Route::post('/employee/{employee}/pay', [PaymentController::class, 'payEmployee'])->name('pay.emp.salary');
    Route::post('/create/{employee}/payout', [RazorpayController::class, 'sendMoney'])->name('createPayout');
    Route::get('razorpay-payment', [RazorpayController::class, 'index']);
    Route::post('razorpay-payment', [RazorpayController::class, 'store'])->name('razorpay.payment.store');
    Route::post('/salary/send/{employeeId}', [SalaryController::class, 'sendSalary'])->name('sendSalary');
    Route::get('/salary/employee/{employeeId}', [SalaryController::class, 'getSendSalary'])->name('get.emp.sendSalary');
    // Route::post('/transfer-salary', [SalaryController::class, 'transferSalary']);
    Route::post('/payroll/{employeeId}', [PayrollController::class, 'createPayroll']);
    Route::get('/payroll/{employeeId}', [PayrollController::class, 'viewPayroll'])->name('payroll');
    // 
    Route::post('/pay-salary/{employeeId}', [PaymentController::class, 'paySalary']);
    // Employee CRUD
    Route::post('/employee/info/profile/store', [EmployeeController::class, 'adminInfoProfileStore'])->name('employee.info.profile.store');
    Route::post('/employee/info/personal/store', [EmployeeController::class, 'storePersonalInfo'])->name('employee.personal.info.store');
    Route::post('/employee/joining/info/store', [EmployeeController::class, 'storeJoiningInfo'])->name('employee.joining.info.store');
    Route::post('/employee/position/info/store', [EmployeeController::class, 'storePositionInfo'])->name('employee.position.info.store');
    Route::post('/employee/address/info/store', [EmployeeController::class, 'storeAddressInfo'])->name('employee.address.info.store');
    // end
    Route::get('/employee/name/list', [EmployeeController::class, 'adminNameList'])->name('admin.employee.list');
    Route::get('/employees', [EmployeeController::class, 'adminEmployee'])->name('admin.employee');
    Route::post('/employee/store', [EmployeeController::class, 'adminEmployeeStore'])->name('admin.employee.store');
    Route::put('/employee/updatePersonalInfo', [EmployeeController::class, 'updatePersonalInfo'])->name('admin.employee.updatePersonalInfo');
    Route::put('/employee/updateJoiningInfo', [EmployeeController::class, 'updateJoiningInfo'])->name('admin.employee.updateJoiningInfo');
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'employeeInfoEdit'])->name('admin.employees.edit');
    Route::POST('/employee/{id}/update', [EmployeeController::class, 'employeeInfoUpdate'])->name('employees.update');
    Route::delete('/employee/delete/{id}', [EmployeeController::class, 'adminEmployeeDelete'])->name('employees.delete');
    Route::post('/employees/search', [EmployeeController::class, 'ajaxSearch'])->name('employees.ajaxSearch');
    Route::any('/employees/viewEmployee', [EmployeeController::class, 'viewEmployee'])->name('employees.viewEmployee');
    
    Route::get('/employee/{id}/profile/', [EmployeeController::class, 'adminEmployeeView'])->name('admin.employee.view');

    Route::get('/holidays', [HolidayController::class, 'adminHolidays'])->name('admin.holidays');
    Route::post('/holidays/store', [HolidayController::class, 'adminHolidayStore'])->name('admin.holiday.store');
    Route::get('/holiday/edit/{id}', [HolidayController::class, 'adminHolidayEdit'])->name('admin.holiday.edit');
    Route::POST('/holiday/{id}/update', [HolidayController::class, 'adminHolidayUpdate'])->name('admin.holiday.update');
    Route::delete('/holiday/delete/{id}', [HolidayController::class, 'adminHolidayDelete'])->name('admin.holiday.delete');

    Route::get('/departments', [DepartmentController::class, 'adminDepartment'])->name('admin.department');
    Route::post('/department/store', [DepartmentController::class, 'adminDepartmentStore'])->name('admin.department.store');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'adminDepartmentEdit'])->name('admin.department.edit');
    Route::POST('/department/{id}/update', [DepartmentController::class, 'adminDepartmentUpdate'])->name('admin.department.update');
    Route::delete('/department/delete/{id}', [DepartmentController::class, 'adminDepartmentDelete'])->name('admin.department.delete');

    // Leave Type
    Route::get('/leave-types', [LeaveTypeController::class, 'index'])->name('leave.type');
    Route::post('/leave-type/store', [LeaveTypeController::class, 'store'])->name('leave.type.store');
    Route::get('/leave-type/edit/{id}', [LeaveTypeController::class, 'editLeave'])->name('leave.type.edit');
    Route::POST('/leave-type/{id}/update', [LeaveTypeController::class, 'leaveUpdate'])->name('leave.type.update');
    Route::delete('/leave-type/delete/{id}', [LeaveTypeController::class, 'leaveDelete'])->name('leave.type.delete');

    Route::get('/designations', [DesignationController::class, 'adminDesignation'])->name('admin.designation');
    Route::post('/designation/store', [DesignationController::class, 'adminDesignationStore'])->name('admin.designation.store');
    Route::get('/designation/edit/{id}', [DesignationController::class, 'adminDesignationEdit'])->name('admin.designation.edit');
    Route::POST('/designation/{id}/update', [DesignationController::class, 'adminDesignationUpdate'])->name('admin.designation.update');
    Route::delete('/designation/delete/{id}', [DesignationController::class, 'adminDesignationDelete'])->name('admin.designation.delete');

    Route::get('employee/overtime', [OvertimeController::class, 'adminOvertime'])->name('admin.overtime');
    Route::post('employee/overtime/store', [OvertimeController::class, 'adminOvertimeStore'])->name('admin.employee.overtime.store');
    Route::get('employee/overtime/edit/{id}', [OvertimeController::class, 'adminOvertimeEdit'])->name('admin.employee.overtime.edit');
    Route::POST('employee/overtime/{id}/update', [OvertimeController::class, 'adminOvertimeUpdate'])->name('admin.employee.overtime.update');
    Route::delete('employee/overtime/delete/{id}', [OvertimeController::class, 'adminOvertimeDelete'])->name('admin.employee.overtime.delete');

    // attendance
    Route::get('employee/attendance', [AttendanceController::class, 'showAttendance'])->name('admin.employee.attendance');
    Route::get('employee/attendance-report', [AttendanceController::class, 'reportAttendance'])->name('employee.attendance.report');
    Route::post('/attendance/filter', [AttendanceController::class, 'filterAttendance'])->name('attendance.filter');
    Route::get('/attendance/data', [AttendanceController::class, 'getAttendanceData']);

    // Employee Salary CRUD
    Route::get('employee/salary', [SalaryController::class, 'adminSalary'])->name('admin.employee.salary');
    Route::post('employee/salary/store', [SalaryController::class, 'adminSalaryStore'])->name('admin.employee.salary.store');
    Route::get('employee/salary/edit/{id}', [SalaryController::class, 'adminSalaryEdit'])->name('admin.employee.salary.edit');
    Route::POST('employee/salary/{id}/update', [SalaryController::class, 'adminSalaryUpdate'])->name('admin.employee.salary.update');
    Route::delete('employee/salary/delete/{id}', [SalaryController::class, 'adminSalaryDelete'])->name('admin.employee.salary.delete');
    Route::get('employee/salary/slip/{id}', [SalaryController::class, 'adminSalarySlip'])->name('admin.employee.salary.slip');
    Route::get('employee/salary/slip/invoice/{id}/pdf', [SalaryController::class, 'generateSalarySlipPDF'])->name('admin.employee.salary.invoice');

    // Invoice CRUD
    Route::get('employee/invoices', [InvoiceController::class, 'adminSalaryInvoice'])->name('admin.employee.invoice');
    Route::get('client/data/find', [InvoiceController::class, 'findClientName'])->name('find.client.name');
    Route::get('create/employee/invoices', [InvoiceController::class, 'adminSalaryCreateInvoice'])->name('admin.create.invoice');
    Route::post('employee/invoice/store', [InvoiceController::class, 'adminSalaryInvoiceStore'])->name('admin.employee.invoice.store');
    Route::get('employee/invoice/edit/{id}', [InvoiceController::class, 'adminSalaryInvoiceEdit'])->name('admin.employee.invoice.edit');
    Route::POST('employee/invoice/{id}/update', [InvoiceController::class, 'adminSalaryInvoiceUpdate'])->name('admin.employee.invoice.update');
    Route::delete('employee/invoice/delete/{id}', [InvoiceController::class, 'adminSalaryInvoiceDelete'])->name('admin.employee.invoice.delete');
    Route::get('/invoice-view/{id}', [InvoiceController::class, 'adminInvoiceView'])->name('admin.invoice.view');
    Route::get('employee/invoice/slip/invoice/{id}/pdf', [InvoiceController::class, 'generateSalarySlipPDF'])->name('admin.employee.salary.invoice');
    Route::get('invoice-print/{id}/pdf', [InvoiceController::class, 'generateInvoicePrintPDF'])->name('admin.invoice.print');



    // Client CRUD
    Route::get('/clients', [ClientController::class, 'adminClient'])->name('admin.client');
    Route::post('/client/store', [ClientController::class, 'adminClientStore'])->name('admin.client.store');
    Route::get('/client/edit/{id}', [ClientController::class, 'adminClientEdit'])->name('admin.client.edit');
    Route::POST('/client/{id}/update', [ClientController::class, 'adminClientUpdate'])->name('client.update');
    Route::delete('/client/delete/{id}', [ClientController::class, 'adminClientDelete'])->name('client.delete');
    Route::post('/client/search', [ClientController::class, 'ajaxSearch'])->name('client.ajaxSearch');
    Route::get('/client/{id}/profile/', [ClientController::class, 'adminClientView'])->name('admin.client.view');

    // CRUD for Lead
    Route::get('/leads', [LeadController::class, 'adminLead'])->name('admin.lead');
    Route::post('/lead/store', [LeadController::class, 'adminLeadStore'])->name('admin.lead.store');
    Route::get('/lead/edit/{id}', [LeadController::class, 'adminLeadEdit'])->name('admin.lead.edit');
    Route::POST('/lead/{id}/update', [LeadController::class, 'adminLeadUpdate'])->name('lead.update');
    Route::delete('/lead/delete/{id}', [LeadController::class, 'adminLeadDelete'])->name('lead.delete');
    // Route::post('/lead/search', [LeadController::class, 'ajaxSearch'])->name('lead.ajaxSearch');

    // CRUD for project
    Route::get('/projects', [ProjectController::class, 'adminProject'])->name('admin.project');
    Route::post('/project/store', [ProjectController::class, 'adminProjectStore'])->name('admin.project.store');
    Route::get('/project/edit/{id}', [ProjectController::class, 'adminProjectEdit'])->name('admin.project.edit');
    Route::POST('/project/{id}/update', [ProjectController::class, 'adminProjectUpdate'])->name('project.update');
    Route::delete('/project/delete/{id}', [ProjectController::class, 'adminProjectDelete'])->name('project.delete');
    Route::get('/project/{id}/view/', [ProjectController::class, 'adminProjectView'])->name('admin.project.view');

    // Website Setting
    Route::get('/web/setting', [SettingController::class, 'index'])->name('admin.web.setting');
    Route::post('/companies', [SettingController::class, 'store'])->name('setting.web'); // Create
    Route::put('/companies/{id}', [SettingController::class, 'store']); // Update
    Route::get('/companies/{id}', [SettingController::class, 'show']); 

    // Taxes CRUD
    Route::get('/taxes', [TaxController::class, 'adminTax'])->name('admin.tax');
    Route::post('/tax/store', [TaxController::class, 'adminTaxStore'])->name('admin.tax.store');
    Route::get('/tax/edit/{id}', [TaxController::class, 'adminTaxEdit'])->name('admin.tax.edit');
    Route::POST('/tax/{id}/update', [TaxController::class, 'adminTaxUpdate'])->name('admin.tax.update');
    Route::delete('/tax/delete/{id}', [TaxController::class, 'adminTaxDelete'])->name('admin.tax.delete');
    Route::get('/find/tax}', [TaxController::class, 'adminTaxFind'])->name('admin.find.tax');

    // PF CRUD
    Route::get('/provident-fund', [PFController::class, 'adminPF'])->name('admin.provident-fund');
    Route::post('/provident-fund/store', [PFController::class, 'adminPFStore'])->name('admin.provident-fund.store');
    Route::get('/provident-fund/edit/{id}', [PFController::class, 'adminPFEdit'])->name('admin.provident-fund.edit');
    Route::POST('/provident-fund/{id}/update', [PFController::class, 'adminPFUpdate'])->name('admin.provident-fund.update');
    Route::delete('/provident-fund/delete/{id}', [PFController::class, 'adminPFDelete'])->name('admin.provident-fund.delete');

    // GOAL Type CRUD
    Route::get('/goal-type', [GoalController::class, 'adminGoalType'])->name('admin.goal-type');
    Route::post('/goal-type/store', [GoalController::class, 'adminGoalTypeStore'])->name('admin.goal-type.store');
    Route::get('/goal-type/edit/{id}', [GoalController::class, 'adminGoalTypeEdit'])->name('admin.goal-type.edit');
    Route::POST('/goal-type/{id}/update', [GoalController::class, 'adminGoalTypeUpdate'])->name('admin.goal-type.update');
    Route::delete('/goal-type/delete/{id}', [GoalController::class, 'adminGoalTypeDelete'])->name('admin.goal-type.delete');

    // Goal Tracking CRUD
    Route::get('/goal-tracking', [GoalTrackingController::class, 'adminGoalTracking'])->name('admin.goal-tracking');
    Route::post('/goal-tracking/store', [GoalTrackingController::class, 'adminGoalTrackingStore'])->name('admin.goal-tracking.store');
    Route::get('/goal-tracking/edit/{id}', [GoalTrackingController::class, 'adminGoalTrackingEdit'])->name('admin.goal-tracking.edit');
    Route::POST('/goal-tracking/{id}/update', [GoalTrackingController::class, 'adminGoalTrackingUpdate'])->name('admin.goal-tracking.update');
    Route::delete('/goal-tracking/delete/{id}', [GoalTrackingController::class, 'adminGoalTrackingDelete'])->name('admin.goal-tracking.delete');

    // Promote CRUD
    Route::get('/promotion', [PromotionController::class, 'adminPromotion'])->name('admin.promotion');
    Route::post('/promotion/store', [PromotionController::class, 'adminPromotionStore'])->name('admin.promotion.store');
    Route::get('/promotion/edit/{id}', [PromotionController::class, 'adminPromotionEdit'])->name('admin.promotion.edit');
    Route::POST('/promotion/{id}/update', [PromotionController::class, 'adminPromotionUpdate'])->name('admin.promotion.update');
    Route::delete('/promotion/delete/{id}', [PromotionController::class, 'adminPromotionDelete'])->name('admin.promotion.delete');
    Route::get('employee/data/find', [PromotionController::class, 'findEmployeeName'])->name('find.employee.name');

    // Terminations CRUD
    Route::get('/terminations', [TerminationController::class, 'adminTerminations'])->name('admin.terminations');
    Route::post('/terminations/store', [TerminationController::class, 'adminTerminationsStore'])->name('admin.terminations.store');
    Route::get('/terminations/edit/{id}', [TerminationController::class, 'adminTerminationsEdit'])->name('admin.terminations.edit');
    Route::POST('/terminations/{id}/update', [TerminationController::class, 'adminTerminationsUpdate'])->name('admin.terminations.update');
    Route::delete('/terminations/delete/{id}', [TerminationController::class, 'adminTerminationsDelete'])->name('admin.terminations.delete');
    
    // Resignations CRUD
    Route::get('/resignations', [ResignationController::class, 'adminResignations'])->name('admin.resignations');
    Route::post('/resignations/store', [ResignationController::class, 'adminResignationsStore'])->name('admin.resignations.store');
    Route::get('/resignations/edit/{id}', [ResignationController::class, 'adminResignationsEdit'])->name('admin.resignations.edit');
    Route::POST('/resignations/{id}/update', [ResignationController::class, 'adminResignationsUpdate'])->name('admin.resignations.update');
    Route::delete('/resignations/delete/{id}', [ResignationController::class, 'adminResignationsDelete'])->name('admin.resignations.delete');

    // Training Type CRUD
    Route::get('/training-type', [TrainingTypeController::class, 'adminTrainingType'])->name('admin.training-type');
    Route::post('/training-type/store', [TrainingTypeController::class, 'adminTrainingTypeStore'])->name('admin.training-type.store');
    Route::get('/training-type/edit/{id}', [TrainingTypeController::class, 'adminTrainingTypeEdit'])->name('admin.training-type.edit');
    Route::POST('/training-type/{id}/update', [TrainingTypeController::class, 'adminTrainingTypeUpdate'])->name('admin.training-type.update');
    Route::delete('/training-type/delete/{id}', [TrainingTypeController::class, 'adminTrainingTypeDelete'])->name('admin.training-type.delete');

    // Training CRUD
    Route::get('/training', [TrainingController::class, 'adminTraining'])->name('admin.training');
    Route::post('/training/store', [TrainingController::class, 'adminTrainingStore'])->name('admin.training.store');
    Route::get('/training/edit/{id}', [TrainingController::class, 'adminTrainingEdit'])->name('admin.training.edit');
    Route::POST('/training/{id}/update', [TrainingController::class, 'adminTrainingUpdate'])->name('admin.training.update');
    Route::delete('/training/delete/{id}', [TrainingController::class, 'adminTrainingDelete'])->name('admin.training.delete');

    // Trainers CRUD
    Route::get('/trainer', [TrainerController::class, 'adminTrainerType'])->name('admin.trainer');
    Route::post('/trainer/store', [TrainerController::class, 'adminTrainerTypeStore'])->name('admin.trainer.store');
    Route::get('/trainer/edit/{id}', [TrainerController::class, 'adminTrainerTypeEdit'])->name('admin.trainer.edit');
    Route::POST('/trainer/{id}/update', [TrainerController::class, 'adminTrainerTypeUpdate'])->name('admin.trainer.update');
    Route::delete('/trainer/delete/{id}', [TrainerController::class, 'adminTrainerTypeDelete'])->name('admin.trainer.delete');

   
 // Portal Tasks
    Route::get('/portal/tasks', [TaskController::class, 'taskPortal'])->name('portal.tasks');
    Route::post('/portal/tasks/store', [TaskController::class, 'taskStore'])->name('store.tasks');
    
    // Overview
    Route::get('/employee/overview', [EmployeeController::class, 'overview'])->name('employee.overview');
    Route::get('/employee/analyticsHub', [EmployeeController::class, 'analyticsHub'])->name('employee.analyticsHub');
    Route::get('/employee/account/info', [EmployeeController::class, 'bankInfo'])->name('employee.bankInfo');
    Route::get('/employee/emp-directory', [EmployeeController::class, 'empDirectory'])->name('employee.directory');
    Route::get('employee/all/info/get', [EmployeeController::class, 'getAllInfo'])->name('employee.all.info.get');
    Route::get('employee/personal/info/get', [EmployeeController::class, 'getPersonalInfo'])->name('employee.personal.info.get');
    // Route::get('/employee-headcount', [EmployeeController::class, 'getEmployeeHeadCount'])->name('employee.headcount');
    Route::get('/employee-headcount-monthly', [EmployeeController::class, 'getEmployeeHeadCountByMonth'])->name('employee.headcount.monthly');
    Route::post('/employees/bank/search/', [EmployeeController::class, 'bankSearch'])->name('employees.bankSearch');
    Route::get('/bank/detail/edit/{id}', [EmpBankController::class, 'employeeBankDetailsEdit'])->name('employeeBankDetailsEdit');

    // identity-verification
    Route::get('/employee/identity-verification/', [EmployeeController::class, 'identityVerification'])->name('employees.identityVerification');
    
    // Employee Document
    Route::get('/employee/info/employee-docs/', [EmpDocController::class, 'employeeDoc'])->name('employeeDoc');

    Route::post('/info/employee-docs/', [EmpDocController::class, 'employeeGetDoc'])->name('get.doc.info');
    Route::post('store/info/employee-docs/', [EmpDocController::class, 'employeePostDoc'])->name('post.doc.info');
    Route::get('/edit-doc-info/{id}', [EmpDocController::class, 'editDocument'])->name('edit.doc.info');
    Route::post('delete-doc-file', [EmpDocController::class, 'deleteDocFile'])->name('delete.doc.file');
    Route::delete('/delete-doc-info/{id}', [EmpDocController::class, 'deleteDocInfo']);
    Route::get('/employee/downloadDocument/{id}', [EmpDocController::class, 'downloadDocument'])->name('download.document');
   



    // Emp Bank Details
    Route::post('/employees/bank/details', [EmpBankController::class, 'empBankDetail'])->name('employees.empBankDetail');
    Route::POST('/bank/details/{id}/update', [EmpBankController::class, 'empBankDetailUpdate'])->name('empBankDetailUpdate');

    // ESI
    Route::post('/employee/update-esi', [ESIController::class, 'updateEsi'])->name('employee.updateEsi');
    
    // PF
    Route::post('/employee/update-pf', [PFController::class, 'updatePF'])->name('employee.updatePF');
    

    Route::get('/branches/{bank_id}', [EmpBankController::class, 'getBranches'])->name('branches.get');



    // Category CRUD
    Route::get('/category-list', [CategoryController::class, 'categoryList'])->name('category.list');
    Route::post('/category-list/store', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('/category-list/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::POST('/category-list/{id}/update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::delete('/category-list/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');


    // Bank CRUD
    Route::get('/bank-list', [BankController::class, 'bankList'])->name('bank.list');
    Route::post('/bank-list/store', [BankController::class, 'bankStore'])->name('bank.store');
    Route::get('/bank-list/edit/{id}', [BankController::class, 'bankEdit'])->name('bank.edit');
    Route::POST('/bank-list/{id}/update', [BankController::class, 'bankUpdate'])->name('bank.update');
    Route::delete('/bank-list/delete/{id}', [BankController::class, 'bankDelete'])->name('bank.delete');

    // Bank Branch
    Route::get('/bank-branch-list', [BankController::class, 'bankBranchList'])->name('bank.branch.list');
    Route::post('/bank-branch-list/store', [BankController::class, 'bankBranchStore'])->name('bank.branch.store');
    Route::get('/bank-branch-list/edit/{id}', [BankController::class, 'bankBranchEdit'])->name('bank.branch.edit');
    Route::POST('/bank-branch-list/{id}/update', [BankController::class, 'bankBranchUpdate'])->name('bank.branch.update');
    Route::delete('/bank-branch-list/delete/{id}', [BankController::class, 'bankBranchDelete'])->name('bank.branch.delete');

    // Get Data In Excel
    Route::get('/employees/export', [EmployeeController::class, 'exportEmployees'])->name('employees.export');

    // PreviousEmployement
    Route::get('employee/info/previousemployeement', [PreviousEmploymentController::class,'index'])->name('previousemployeement');
    Route::post('get/employee/info/previousemployeement', [PreviousEmploymentController::class,'previousEmployeementGet'])->name('previousEmployeementGet');
    Route::post('post/employee/info/previousemployeement', [PreviousEmploymentController::class,'previousEmployeementPost'])->name('previousEmployeementPost');
    Route::delete('/previousemployeement/delete/{id}', [PreviousEmploymentController::class, 'previousemployeementDelete'])->name('previousemployeement.delete');
    Route::get('/previousemployeement/edit/{id}', [PreviousEmploymentController::class, 'previousemployeementEdit'])->name('previousemployeement.edit');
    Route::POST('/previousemployeement/{id}/update', [PreviousEmploymentController::class, 'previousemployeementdate'])->name('previousemployeement.update');

    // Get Employee Leave
    Route::get('employee/apply/leave', [LeaveController::class,'adminGetLeave'])->name('get.apply.leave');
    Route::get('/view/apply/leave/{id}', [LeaveController::class, 'applyGetLeave']);
    Route::post('/verify/apply/leave/{id}', [LeaveController::class, 'applyLeaveVerify']);


});

// Group routes for employee adminHolidayEdit
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee', [DashboardController::class, 'employeeDashboard'])->name('employee.dashboard');
    
});

require __DIR__.'/auth.php';
