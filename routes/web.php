<?php

use App\Http\Middleware\CheckTalent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('talent/test/condition','TalentNewController@condition');
//end of adi
Route::get('/', 'homeController@index')->name('index');
Route::get('/home', 'homeController@index')->name('home');
Route::get('/talent-register', 'homeController@apply')->name('talent-register');
Route::get('/load-inquiry-form', 'homeController@loadInquiry')->name('load-inquiry-form');
Route::get('/ecosystem', 'homeController@ecosystem')->name('ecosystem');
Route::get('/dedicated-team', 'homeController@dedicated')->name('dedicated-team');
Route::get('/headhunter', 'homeController@headhunter')->name('headhunter');
Route::get('/help-business', 'homeController@helpBusiness')->name('help-business');
Route::get('/help-talent', 'homeController@helpTalent')->name('help-talent');
Route::get('/faq', 'homeController@faq')->name('faq');
Route::post('/send-inquiry', 'homeController@sendInquiry')->name('send-inquiry');
Route::get("/track","homeController@track")->name("mail-tracking");

Route::get('/mailSends','TalentNewController@mailSends');

// LOGIN ADMIN
Route::get('/login'.date("dmY"), 'LoginController@index')->name('login');
Route::post('/login/process', 'LoginController@processLogin')->name('process.login');

// LOGIN MEMBER
Route::post('/login/member', 'LoginController@doLogin')->name('process.login.member');
Route::get('/logout', 'LoginController@logout')->name('logout');

// REGISTER TALENT
Route::get('/register/talent', 'MemberController@loadRegisterTalent')->name('load.register.talent');
Route::post('/register/talent/step1', 'MemberController@regTalentStep1')->name('reg.talent.step1');
Route::post('/register/talent', 'MemberController@registerTalent')->name('post.register.talent');
Route::get("/json/skill","MemberController@json_skill")->name('json.skill');

Route::prefix("talent")->middleware(CheckTalent::class)->group(function()
{
	Route::get("/dashboard","MemberController@talentDashboard")->name('talent.dashboard');
}); 



Route::get("/member/logout","MemberController@doLogout")->name('member.logout');	


Route::group(['middleware'=>'cek'],function(){


	// Route::group(['prefix'=>'admin'], function(){
	// 	Route::get('/dashboard', 'userController@index')->name('user.dashboard');
	// });

/////////////////////////////
Route::get("/profile", "MemberController@profile"); //my profile
Route::get("/profile/{talent_id}", "MemberController@profile");  //other profile

Route::group(['prefix'=>'member'], function()
{
	Route::get("edit-basic-profile", "MemberController@editBasic");
	Route::post("edit-basic-profile", "MemberController@editBasicPost");

	Route::get("crop-photo", "MemberController@cropPhoto");
	Route::post("crop-photo", "MemberController@cropPhotoPost");

	Route::get("edit-work", "MemberController@editWork");
	Route::post("edit-work", "MemberController@editWorkPost");
	Route::get("edit-work-delete/{id}", "MemberController@editWorkDelete");

	Route::get("edit-education", "MemberController@editEducation");
	Route::post("edit-education", "MemberController@editEducationPost");
	Route::get("edit-education-delete/{id}", "MemberController@editEducationDelete");

	Route::get("edit-skill", "MemberController@editSkill");
	Route::post("edit-skill", "MemberController@editSkillPost");
	Route::post("update-level", "MemberController@updateSkill");

	Route::get("edit-cv", "MemberController@editCv");
	Route::post("post-cv", "MemberController@postCv");

	Route::get("crop-porto/{id}", "MemberController@cropPorto");
	Route::post("crop-porto/{id}", "MemberController@cropPortoPost");

	Route::get("edit-porto", "MemberController@editPorto");
	Route::post("post-porto", "MemberController@postPorto");
	Route::get("delete-porto/{id}", "MemberController@portoDelete");
	Route::get("update-porto/{id}", "MemberController@portoUpdate");
	Route::post("update-porto/{id}", "MemberController@portoUpdatePost");

});

////////////////////////////


	Route::get('/blast', 'jobsapplyController@blast_show')->name('blast');

	Route::group(['prefix'=>'admin'], function(){

		Route::get('/dashboard', 'adminController@index')->name('dashboard');
		Route::post('/count', 'adminController@count')->name('dashboard.count');

		Route::group(['prefix'=>'jobsapply'], function(){
			Route::get('/', 'jobsapplyController@index')->name('jobsapply');
			Route::get('/notify', 'jobsapplyController@notify')->name('jobsapply.notify');
			route::get('/interview/{id}', 'InterviewController@index')->name('jobsapply.interview');
			route::get('/interview/download_report/{id}', 'InterviewController@downloadReport')->name('interview.downloadreport');
			Route::get('/all', 'jobsapplyController@all')->name('jobsapply.all');
			Route::get('/all/unprocess', 'jobsapplyController@allUnprocess')->name('all.unprocess');
			Route::get('/all/interview', 'jobsapplyController@allInterview')->name('all.interview');
			Route::get('/all/tc', 'jobsapplyController@allTestcode')->name('all.tc');
			Route::get('/all/hired', 'jobsapplyController@allHired')->name('all.hired');
			Route::get('/all/keep', 'jobsapplyController@allKeep')->name('all.keep');
			Route::get('/all/ready', 'jobsapplyController@allReady')->name('all.ready');
			Route::get('/all/reject', 'jobsapplyController@allReject')->name('all.reject');
			Route::get('/all/testonline', 'jobsapplyController@allTestonline')->name('all.testonline');
			Route::get('/all/offered', 'jobsapplyController@allOffered')->name('all.offered');
			Route::get('/detail', 'jobsapplyController@detail')->name('jobsapply.detail');
			Route::get('/delete', 'jobsapplyController@delete')->name('jobsapply.delete');
			Route::get('/move', 'jobsapplyController@move')->name('jobsapply.move');
			Route::get('/pindah', 'jobsapplyController@pindah')->name('jobsapply.pindah');
			Route::post('/interview/add', 'InterviewController@add')->name('interview.add');
			Route::post('/interview/reschedule', 'InterviewController@reschedule')->name('interview.reschedule');
			Route::post('/interview/batalkan', 'InterviewController@batalkan')->name('interview.batalkan');
			Route::post('/interview/simpanreport', 'InterviewController@simpanReport')->name('interview.simpanreport');
			Route::post('/note/add', 'jobsapplyController@noteAdd')->name('note.add');
			Route::post('/note/remove', 'jobsapplyController@noteRemove')->name('note.remove');
			Route::post('/note/get', 'jobsapplyController@noteGet')->name('note.get');
			Route::post('/label/get', 'jobsapplyController@labelGet')->name('label.get');
			Route::post('/label/add', 'jobsapplyController@labelAdd')->name('label.add');
			Route::post('/rush/get', 'jobsapplyController@rushGet')->name('rush.get');
			Route::post('/rushedit', 'jobsapplyController@rushEdit')->name('rush.edit');
			Route::post('/substeps/getsubsteps', 'jobsapplysubsteps@getSubsteps')->name('substeps.getsubsteps');
			Route::post('/substeps/get', 'jobsapplysubsteps@get')->name('substeps.get');
			Route::post('/substeps/checked', 'jobsapplysubsteps@checked')->name('substeps.checked');
			Route::post('/substeps/unchecked', 'jobsapplysubsteps@unchecked')->name('substeps.unchecked');
			Route::post('/substeps/note', 'jobsapplysubsteps@note')->name('substeps.note');
			Route::get('/changestatusapprove','jobsapplyController@changeStatusApprove')->name('jobsapply.changestatusapprove');
			Route::post('/getreminder','jobsapplyController@getreminder')->name('jobsapply.getreminder');
			Route::get('/editreminder','jobsapplyController@editreminder')->name('jobsapply.editreminder');

		});

		// Route::group(['prefix'=>'talent'], function(){
		// 	Route::get('/', 'talentController@index')->name('talent.index');
		// 	Route::get('/all', 'talentController@all')->name('talent.all');
		// 	Route::get('/all/unprocess', 'talentController@allUnprocess')->name('talent.unprocess');
		// 	Route::get('/all/quarantine', 'talentController@allQuarantine')->name('talent.quarantine');
		// 	Route::get('/all/assign', 'talentController@allAssign')->name('talent.assign');
		// 	Route::post('/changestatus', 'talentController@changeStatusAssign')->name('talent.changestatus');
		// 	Route::get('/detail', 'talentController@detail')->name('talent.detail');
		// 	// Route::get('/detail/{id}', 'talentController@detail')->name('talent.detail');
		// 	Route::get('/delete', 'talentController@delete')->name('talent.delete');
		// 	Route::get('/move', 'talentController@move')->name('talent.move');
		// 	Route::get('/skill', 'talentController@skillTalent')->name('talent.skill');
		// 	Route::post('/addskill', 'talentController@addSkillTalent')->name('talent.addskill');
		// 	Route::post('/addsapply', 'talentController@addApplyTalent')->name('talent.addapply');
		// 	Route::post('/answer/{id}', 'talentController@answer')->name('talent.answer');
		// 	Route::post('/addassign', 'talentController@addAssignTalent')->name('talent.addassign');
		// 	Route::get('/assign', 'talentController@assignTalent')->name('talent.assign-data');
		// 	Route::get('/apply', 'talentController@applyTalent')->name('talent.apply');
		// 	Route::get('/verified', 'talentController@skillVerified')->name('talent.skillverified');
		// 	Route::post('/skill/update','talentController@updateSkill')->name('talent.skillupdate');
		// 	Route::post('/date_ready/update','talentController@updateReady')->name('talent.updateready');
		// 	Route::get('/get/request','talentController@getRequest')->name('talent.getrequest');
		// 	Route::get('/move/quarantine','talentController@moveQuarantine')->name('talent.quarantine');
		// });

		Route::group(['prefix'=>'substeps'], function(){
			Route::post('/add', 'Substeps@add')->name('substeps.add');
			Route::post('/edit', 'Substeps@edit')->name('substeps.edit');
			Route::post('/delete', 'Substeps@delete')->name('substeps.delete');
			Route::post('/moveup', 'Substeps@moveUp')->name('substeps.moveup');
			Route::post('/movedown', 'Substeps@moveDown')->name('substeps.movedown');
			Route::post('/getemailtext', 'Substeps@getemailtext')->name('substeps.getemailtext');
			Route::get('/get/unprocess', 'Substeps@getUnprocess')->name('get.unprocess');
			Route::get('/get/testonline', 'Substeps@gettestonline')->name('get.testonline');
			Route::get('/get/interview', 'Substeps@getinterview')->name('get.interview');
			Route::get('/get/offered', 'Substeps@getoffered')->name('get.offered');
			Route::get('/get/hired', 'Substeps@gethired')->name('get.hired');
			Route::get('/get/reject', 'Substeps@getreject')->name('get.reject');

		});


		Route::group(['prefix'=>'jobs'], function(){
			Route::get('/', 'jobsController@index')->name('index.jobs');
			Route::get('/all', 'jobsController@all')->name('jobs.all');
			Route::get('/delete', 'jobsController@deleteJobs')->name('jobsAll.delete');
			Route::get('/edit/{id}', 'jobsController@edit')->name('edit.job');

			Route::get('/create', 'jobsController@create')->name('jobs.create');
			Route::post('/store', 'jobsController@store')->name('jobs.store');
			Route::post('/update/{id}', 'jobsController@update');


		});

		Route::group(['prefix'=>'others'], function(){
			Route::get('/', 'othersController@index')->name('others');
			Route::get('/locations', 'othersController@locations')->name('locations');
			Route::get('/campaign', 'CampaignController@campaign')->name('campaign');
			Route::post('/campaign/add', 'CampaignController@campaignAdd')->name('campaign.add');
			Route::post('/campaign/edit', 'CampaignController@campaignEdit')->name('campaign.edit');
			Route::post('/locations/add', 'othersController@locationsAdd')->name('locations.add');
			Route::post('/locations/edit', 'othersController@locationsEdit')->name('locations.edit');
			Route::get('/locations/delete', 'othersController@locationsDelete')->name('locations.delete');
			Route::get('/categories', 'othersController@categories')->name('categories');
			Route::post('/categories/add', 'othersController@categoriesAdd')->name('categories.add');
			Route::post('/categories/edit', 'othersController@categoriesEdit')->name('categories.edit');
			Route::get('/categories/delete', 'othersController@categoriesDelete')->name('categories.delete');
			Route::post('/media/add', 'mediaController@add')->name('media.add');
			Route::post('/media/edit', 'mediaController@edit')->name('media.edit');
			Route::post('/media/delete', 'mediaController@delete')->name('media.delete');
			Route::get('/media/showtable', 'mediaController@showTable')->name('media.showtable');

		});

		Route::group(['prefix'=>'bootcamp'], function(){
			Route::get('/', 'adminController@bootcamp')->name('bootcamp.index');
			Route::get('/create', 'adminController@createBootcamp')->name('bootcamp.create');
			Route::get('/all', 'adminController@allBootcamp')->name('bootcamp.all');
			//Route::post('store', 'adminController@storeBootcamp')->name('bootcamp.store');
			Route::get('/detail/{id}', 'adminController@detail')->name('bootcamp.detail');
			Route::post('/insert', 'adminController@kalenderEvent')->name('calendar.insert');
			Route::get('/editcalendar/{id}', 'adminController@editKalender')->name('calendar.edit');
			Route::put('/updatecalendar/{id}', 'adminController@updateKalender')->name('calendar.update');
			Route::get('/deletecalendar/', 'adminController@deleteKalender')->name('calendar.delete');
			Route::post('/addlocation', 'adminController@eventlocation')->name('event.location');
			Route::post('/addmateri', 'adminController@materiEvent')->name('event.materi');
			Route::post('/addsoal', 'adminController@soalEvent')->name('event.soal');
			Route::post('/addmentor', 'adminController@mentorEvent')->name('event.addmentor');
			Route::get('/edit', 'adminController@editBootcamp')->name('bootcamp.edit');
			Route::post('update/{id}', 'adminController@updateBootcamp')->name('bootcamp.update');
			Route::get('/delete/', 'adminController@deleteBootcamp')->name('bootcamp.delete');
			Route::get('/applicant', 'adminController@eventlist')->name('eventlist');
			Route::get('/applicant/{id}', 'adminController@applicant')->name('applicant.index');
			Route::get('/allapplicant/', 'adminController@allApplicant')->name('applicant.all');
			Route::get('/alllolos/', 'adminController@allLolos')->name('applicant.lolos');
			Route::get('/allsend/', 'adminController@allSend')->name('applicant.send');
			Route::get('/allrecruit/', 'adminController@allRec')->name('applicant.rec');
			Route::post('/addapplicant', 'adminController@storeApplicant')->name('applicant.store');
			Route::get('/editapplicant/{id}', 'adminController@editApplicant')->name('applicant.edit');
			Route::put('/updateapplicant/{id}', 'adminController@updateApplicant')->name('applicant.update');
			Route::get('/deleteapplicant/', 'adminController@deleteApplicant')->name('applicant.delete');
			Route::get('/move/lolos', 'adminController@move')->name('applicant.movelolos');
			Route::get('/move/recruit', 'adminController@moverec')->name('applicant.moverec');
			Route::get('/move/send', 'adminController@movesend')->name('applicant.movesend');
			Route::post('/link/add', 'adminController@linkAdd')->name('link.add');
			// Route::post('/link/remove', 'jobsapplyController@noteRemove')->name('link.remove');
			Route::post('/link/get', 'adminController@linkGet')->name('link.get');
		});
		Route::group(['prefix'=>'campaign'], function(){
			Route::get('/', 'CampaignController@index')->name('campaign.index');
			Route::get('/all', 'CampaignController@all')->name('campaign.all');
			Route::get('/assign', 'CampaignController@assign')->name('campaign.assign');
			Route::post('/delete', 'CampaignController@delete')->name('campaign.delete');
			Route::get('/getmedia', 'CampaignController@getMedia')->name('campaign.getmedia');
			Route::post('/mediachecked', 'CampaignController@mediaChecked')->name('campaign.mediachecked');
			Route::get('/getjobs', 'CampaignController@getJobs')->name('campaign.getjobs');
			Route::post('/jobschecked', 'CampaignController@jobsChecked')->name('campaign.jobschecked');
			Route::post('/checked', 'CampaignController@checked')->name('campaign.checked');
			Route::post('/unchecked', 'CampaignController@unchecked')->name('campaign.unchecked');
			Route::post('/jobs_checked', 'CampaignController@jobs_checked')->name('campaign.jobs_checked');
			Route::post('/jobs_unchecked', 'CampaignController@jobs_unchecked')->name('campaign.jobs_unchecked');
		});

		Route::resource('companies','CompaniesController');
		Route::post('/companies/getdetail','CompaniesController@getdetail')->name('companies.getdetail');
		Route::get('/companies/request/{id}','CompaniesController@request')->name('companies.request');
		Route::post('/companies/addreq', 'CompaniesController@addReq')->name('companies.addReq');
		Route::post('/companies/addreq2', 'CompaniesController@addReq2')->name('companies.addReq2');
		Route::post('/companies/getreq', 'CompaniesController@getReq')->name('companies.getReq');
		Route::delete('/companies/delreq/{id}','CompaniesController@delReq')->name('companies.delReq');
		Route::post('/editreq', 'CompaniesController@editReq')->name('companies.editReq');
		Route::post('/editreq2', 'CompaniesController@editReq2')->name('companies.editReq2');
		Route::get('/companyassign','CompaniesController@companyassign')->name('companies.assign');
		Route::get('/companyassign/{id}','CompaniesController@companyassign')->name('companies.assign');
		Route::get('/companyassign/allassign/','CompaniesController@allassign')->name('companies.dataassign');
		Route::get('/companyrequest','CompaniesController@companyrequest')->name('companies.companyrequest');
		Route::get('/companyrequest/datarequest','CompaniesController@datarequest')->name('companies.datarequest');


		Route::group(['prefix'=>'company'], function(){
			Route::get('/', 'companyController@index')->name('company.index');
			Route::get('/request/{id}', 'companyController@request')->name('company.request');
			Route::get('/all', 'companyController@all')->name('company.all');
			Route::get('/detail/{id}','companyController@detail')->name('company.detail');
			Route::get('/edit', 'companyController@edit')->name('company.edit');
			Route::post('/update/{id}', 'companyController@update');
			Route::get('/allrequest', 'companyController@allRequest')->name('company.allrequest');
			Route::get('/requestttt','companyController@Requesttest')->name('company.requesttest');
			Route::post('/add', 'companyController@add')->name('company.add');
			Route::post('/addreq', 'companyController@addReq')->name('company.addReq');
			Route::post('/editreq', 'companyController@editReq')->name('company.editReq');
			Route::post('/getreq', 'companyController@getReq')->name('company.getReq');
		});

		Route::group(['prefix'=>'talent'], function(){

			
			// adi
			Route::get('/list','TalentNewController@show')->name('talent.list');
			Route::get('/list/condition','TalentNewController@condition');
			Route::get('/list/search','TalentNewController@search');
			Route::get('/list/filter','TalentNewController@filter');
			Route::get('/list/paginate_data','TalentNewController@paginate_data');
			Route::get('/mail/{id}','TalentNewController@mail');
			Route::get('/mail-send/{id}','TalentNewController@mailSend');
			Route::post('/mail-send','TalentNewController@mailSend');
			Route::get('/mail-view/{view}','TalentNewController@viewMail');
			Route::get('/list/export_excel','TalentNewController@export_excel');
			

			Route::get('/list/insert', 'TalentNewController@insert');
			Route::get('/list/delete', 'TalentNewController@deleteData');
			Route::post('/list/insert/data', 'TalentNewController@insertData');
			
			Route::get('/delete/{id}', 'TalentNewController@delete');
			Route::post('/del', 'TalentNewController@del');
			//end adi


			Route::get('/', 'talentController@index')->name('talent.index');

			//Route Talent List
	// 		Route::get('/', 'talentController@talent_list')->name('talent.listall');
			// Route::get('/request', 'companyController@request')->name('talent.request');
			Route::get('/all', 'talentController@all')->name('talent.all');
			Route::get('/edit', 'talentController@edit')->name('talent.edit');
			// Route::post('/update/{id}', 'talentController@update');
			Route::post('/add', 'talentController@add')->name('talent.add');
			Route::post('/update/{id}', 'talentController@update');
			Route::get('/talentskill/{id}', 'talentController@talentskill')->name('talent.talentskill');
	        Route::get('/portfolio', 'talentController@portfolio')->name('portfolio.talent');
	        Route::get('/portfolio-delete', 'talentController@portfolioDelete')->name('portfolio.delete');
	        Route::post('/portfolio-update','talentController@portfolioUpdate')->name('portfolio.update');
			Route::post('/portfolio-insert', 'talentController@portfolioInsert')->name('portfolio.insert');
			
			//photoprofil
			Route::get('/photo', 'talentController@photo')->name('photo.talent');
			Route::get('/photo-delete', 'talentController@photoDelete')->name('photo.delete');
			Route::post('/photo-update', 'talentController@photoUpdate')->name('photo.update');
			Route::post('/photo-insert', 'talentController@photoInsert')->name('photo.insert');

	        Route::get('/workexperience','talentController@workex')->name('workex.talent');
	        Route::post('/workexperience-insert','talentController@workexInsert')->name('workex.insert');
	        Route::post('/worexperience-update','talentController@workexupdate')->name('workex.update');
	        Route::get('/workexdetail/{id}','talentController@workexdetail')->name('workex.detail');
	        Route::get('/workex-delete','talentController@workex_delete')->name('workex.delete2');
	        Route::post('/workexdelete/{id}','talentController@workexdelete')->name('workex.delete');

	        Route::resource('pratalent', 'PratalentController');
			Route::get('/pratalent/datalinkedin','PratalentController@datalinkedin')->name('pratalent.datalinkedin');
			Route::post('/pratalent/import','PratalentController@import_excel')->name('pratalent.import');
			Route::post('/pratalent/changestatus','PratalentController@changeStatus')->name('pratalent.changestatus');
			

	        Route::post('/addeducation','talentController@addeducation')->name('education.add');
	        Route::get('/detaileducation/{id}','talentController@detaileducation')->name('education.detail');
	        Route::post('/updateeducation/{id}','talentController@updateeducation')->name('education.update');
	        Route::post('/deleteeducation/{id}','talentController@deleteeducation')->name('education.delete');

	        Route::post('/addcertification', 'talentController@addcertification')->name('certification.add');
	        Route::get('/detailcertification/{id}','talentController@detailcertification')->name('certification.detail');
	        Route::post('/updatecertification/{id}','talentController@updatecertification')->name('certification.update');
	        Route::post('/deletecertification/{id}','talentController@deletecertification')->name('certification.delete');
			Route::get('/detailtalent/{id}','talentController@detailtalent')->name('detailtalent');
	        Route::post('/notesreporttalent/{id}','talentController@storenote')->name('notesreporttalent');
	        Route::get('/viewcertif/{id}','talentController@viewcertif')->name('viewcertif');
	        Route::get('/vieweducation/{id}','talentController@viewedu')->name('viewedu');
	        Route::post('/previewreporttalent','ReportTalentPDF@generatePdf')->name('downloadreporttalentnya');

	        Route::get('/all/unprocess', 'talentController@allUnprocess')->name('talent.unprocess');
			Route::get('/all/quarantine', 'talentController@allQuarantine')->name('talent.allquarantine');
			Route::get('/all/assign', 'talentController@allAssign')->name('talent.assign');
			Route::post('/changestatus', 'talentController@changeStatusAssign')->name('talent.changestatus');
			Route::post('/changestatusassign', 'talentController@changeStatus')->name('talent.changestatusassign');
			Route::post('/changestatusquarantine', 'talentController@changeStatusQuarantine')->name('talent.changestatusquarantine');
			Route::get('/detail', 'talentController@detail')->name('talent.detail');
			// Route::get('/detail/{id}', 'talentController@detail')->name('talent.detail');
			Route::get('/delete', 'talentController@delete')->name('talent.delete');
			Route::get('/move', 'talentController@move')->name('talent.move');
			Route::get('/skill', 'talentController@skillTalent')->name('talent.skill');
			Route::get('/deleteskill','talentController@deleteskill')->name('talent.deleteskill');
			Route::post('/addskill', 'talentController@addSkillTalent')->name('talent.addskill');
			Route::post('/addsapply', 'talentController@addApplyTalent')->name('talent.addapply');
			Route::post('/answer/{id}', 'talentController@answer')->name('talent.answer');
			Route::post('/answerpersonality/{id}', 'talentController@answerPersonality')->name('talent.answerpersonality');
			Route::post('/addassign', 'talentController@addAssignTalent')->name('talent.addassign');
			Route::get('/assign', 'talentController@assignTalent')->name('talent.assigndata');
			Route::get('/apply', 'talentController@applyTalent')->name('talent.apply');
			Route::get('/verified', 'talentController@skillVerified')->name('talent.skillverified');
			Route::post('/skill/update','talentController@updateSkill')->name('talent.skillupdate');
			Route::post('/date_ready/update','talentController@updateReady')->name('talent.updateready');
	        // Route::get('/get/request/{id}','talentController@getRequest')->name('talent.getrequest');
	        Route::get('/get/request/{idcompany}/talent/{idtalent}',
	        [ 'uses' =>'talentController@getRequest', 'as' => 'talent-getrequest' ])->name('talent.getrequest');
			Route::get('/move/quarantine','talentController@moveQuarantine')->name('talent.quarantine');
			Route::get('/move/unquarantine','talentController@moveunQuarantine')->name('talent.unquarantine');
			Route::get('/moveStatus','talentController@moveStatus')->name('talent.movestatus');
			Route::post('/getreminder','talentController@getreminder')->name('talent.getreminder');
			Route::post('/editreminder','talentController@editreminder')->name('talent.editreminder');
	        Route::resource('createtalent', 'createtalentController');
	        
	        Route::post('/createjobsid','createtalentController@jobsid')->name('talent.createjobsiid');
	    });

	    Route::group(['prefix'=>'masterdata'], function(){
	        Route::resource('skill','MasterDataController');
	        Route::post('/addskillcategory','MasterDataController@storecategory')->name('skill.storecategory');
	        Route::get('/editkategori/{id}','MasterDataController@editcategory')->name('skill.editcategory');
	        Route::post('/updatekategori','MasterDataController@updatecategory')->name('skill.updatecategory');
	        Route::post('/deletekategori/{id}','MasterDataController@deletecategory')->name('skill.deletecategory');
	        Route::get('/restorekategori/{id}','MasterDataController@restorecategory')->name('skill.restorecategory');
	        Route::resource('personality','MasterDataPersonality');
	        Route::get('/ubahactive/{id}','MasterDataPersonality@ubahactive')->name('personality.ubahactive');
			Route::resource('interview', 'MasterDataInterview');
	        Route::post('/storeposition','MasterDataInterview@storeposition')->name('position.storeposition');
	        Route::get('/position/edit/{id}','MasterDataInterview@editposition')->name('position.editposition');
	        Route::post('/position/update/{id}','MasterDataInterview@updateposition')->name('position.updateposition');
	        Route::resource('campus','MasterDataCampusController');
			Route::delete('/position/hapus/{id}','MasterDataInterview@hapusposition')->name('position.destroy');
			Route::resource('preferlocation','MasterDataLocationController');
			Route::post('/campus/import','MasterDataCampusController@import')->name('campus.import');
			Route::resource('user','MasterDataUserController');

			// Route::post('/addlocation','MasterDataLocationController@store')->name('location.store');
	        // Route::get('/editlocation/{id}','MasterDataLocationController@edit')->name('location.edit');
	        // Route::post('/updatelocation','MasterDataLocationController@update')->name('location.update');
	        // Route::post('/deletelocation/{id}','MasterDataLocationController@destroy')->name('location.destroy');
	       	// Route::get('/restorelocation/{id}','MasterDataLocationController@restore')->name('location.restore');
			Route::resource('mentor','mentorController');
			Route::post('/addmentor','mentorController@storementor')->name('mentor.store');
			Route::get('/editmentor/{id}','mentorController@editmentor')->name('mentor.edit');
			Route::put('/updatementor/{id}','mentorController@updatementor')->name('mentor.update');
			Route::post('/deletementor/{id}','mentorController@deletementor')->name('mentor.delete');
		});

	});
    Route::post('admin/jobsapply/interview/uploadReportTalent/{id}', 'InterviewController@uploadrt')->name('uploadrt');
    Route::get('admin/jobsapply/interview/downloadReportTalent/{id}', 'InterviewController@downloadrt')->name('downloadrt');

    Route::get('/admin/talent/portfoliodetail/{id}','talentController@portfoliodetailya')->name('portfolio.talentdetailya');

	Route::group(['prefix'=>'inquiry'], function(){
		Route::get('/', 'questionController@inquiry')->name('inquiry');
		Route::post('/storeInquiry', 'questionController@storeInquiry')->name('inquiry.storeInquiry');
		Route::delete('/destroyInquiry{id}','questionController@destroyInquiry')->name('inquiry.destroyInquiry');
		Route::get('create', 'questionController@create')->name('inquiry.create');
		Route::get('create/{id}', 'questionController@create')->name('inquiry.create');
		Route::post('/storeQuestion', 'questionController@storeQuestion')->name('inquiry.storeQuestion');
		Route::delete('/destroyQuestion{id}','questionController@destroyQuestion')->name('inquiry.destroyQuestion');

	}); 

	Route::group(['prefix'=>'bootcamp'], function(){

	Route::get('/class', 'bootcampController@getIndex')->name('class.index');
	Route::post('/class', 'bootcampController@postIndex')->name('class.postindex');

	Route::post('/class/new', 'bootcampController@postNew');
	Route::post('/class/newmateri', 'bootcampController@postNewMateri');
	Route::post('/class/delete', 'bootcampController@postDelete');
	Route::get('/class/editclass/{id}', 'bootcampController@getEdit');
	Route::post('/class/editclass/{id}', 'bootcampController@postEdit')->name('post.edit');

	Route::get('/materi', 'bootcampController@materiIndex')->name('materi.index');
	Route::get('/materi/create', 'bootcampController@materiCreate')->name('materi.create');
	Route::post('/materi/addmainmateri','bootcampController@materiStore')->name('materi.store');
	Route::get('/materi/editmainmateri/{id}','bootcampController@materiEdit')->name('materi.edit');
	Route::put('/materi/updatemainmateri','bootcampController@materiUpdate')->name('materi.update');
	Route::post('/materi/deletemainmateri/{id}','bootcampController@materiDelete')->name('materi.delete');
	Route::post('/materi/addsubmateri','bootcampController@submateriStore')->name('submateri.store');
	Route::get('/materi/editsubmateri/{id}','bootcampController@submateriEdit')->name('submateri.edit');
	Route::put('/materi/updatesubmateri/{id}','bootcampController@submateriUpdate')->name('submateri.update');
	Route::post('/materi/deletesubmateri/{id}','bootcampController@submateriDelete')->name('submateri.delete');
	Route::post('/materi/addsoal', 'bootcampController@addSoal')->name('soal.add');
	Route::get('/materi/editsoal/{id}','bootcampController@editSoal')->name('soal.edit');
	Route::put('/materi/updatesoal/{id}','bootcampController@upSoal')->name('soal.update');
	Route::post('/deletesoal/{id}','bootcampController@delSoal')->name('soal.delete');
	Route::get('/faq', 'bootcampController@faqIndex')->name('faq.index');
	Route::post('/addfaq','bootcampController@faqStore')->name('faq.store');
	Route::get('/editfaq/{id}','bootcampController@faqEdit')->name('faq.edit');
	Route::put('/updatefaq/{id}','bootcampController@faqUpdate')->name('faq.update');
	Route::post('/deletefaq/{id}','bootcampController@faqDelete')->name('faq.delete');
	Route::get('/masterdata', 'bootcampController@fasilitasIndex')->name('bmaster.index');
	Route::post('/addfasilitas','bootcampController@fasilitasStore')->name('fasilitas.store');
	Route::get('/editfasilitas/{id}','bootcampController@fasilitasEdit')->name('fasilitas.edit');
	Route::put('/updatefasilitas/{id}','bootcampController@fasilitasUpdate')->name('fasilitas.update');
	Route::post('/deletefasilitas/{id}','bootcampController@fasilitasDelete')->name('fasilitas.delete');
	Route::post('/addicon','bootcampController@iconStore')->name('icon.store');
	Route::get('/editicon/{id}','bootcampController@iconEdit')->name('icon.edit');
	Route::put('/updateicon/{id}','bootcampController@iconUpdate')->name('icon.update');
	Route::post('/deleteicon/{id}','bootcampController@iconDelete')->name('icon.delete');
	Route::post('/addlocation','bootcampController@locationStore')->name('location.store');
	Route::get('/editlocation/{id}','bootcampController@locationEdit')->name('location.edit');
	Route::put('/updatelocation/{id}','bootcampController@locationUpdate')->name('location.update');
	Route::post('/deletelocation/{id}','bootcampController@locationDelete')->name('location.delete');
	Route::get('/alumni', 'bootcampController@alumni')->name('alumni.index');
	Route::get('/alumni/all', 'bootcampController@AlumniIndex')->name('alumni.all');
	Route::post('/addalumni', 'bootcampController@addAlumni')->name('alumni.add');
	Route::get('/editalumni/{id}', 'bootcampController@editAlumni')->name('alumni.edit');
	Route::put('/updatealumni/{id}','bootcampController@upAlumni')->name('alumni.update');
	Route::get('/alumni/move', 'bootcampController@move')->name('alumni.move');

});

});

Route::get('/admin/attend', 'attendController@index')->name('attend.index');
Route::post('/admin/uploadlog', 'attendController@uploadlog')->name('attend.uploadlog');
Route::post('/admin/dopermit', 'attendController@dopermit')->name('attend.dopermit');
// Route::get('/public/interview/{id}', 'attendController@interview')->name('attend.interview');
Route::get('/interview', 'attendController@interview')->name('attend.interview');


Route::get('/home-beta', 'homeController@beta')->name('homebeta');
Route::get('/home-contact', 'homeController@contact')->name('homecontact');
Route::get('/filter', 'homeController@filter')->name('filter');
Route::get('/browse/filter', 'BrowseController@filterbrowse')->name('filterbrowse');
Route::get('/detaillp/{id}', 'homeController@detailLP')->name('detaillp');
Route::get('/detaillp', 'homeController@detailLP')->name('detaillp');
Route::get('/bootcamp', 'bootcampController@index')->name('bootcamp');
Route::get('/bootcamp/{id}', 'bootcampController@detail');
Route::get('/information', 'homeController@info')->name('info');
Route::get('/info-detail', 'homeController@lp')->name('lp');
Route::get('/search/bootcamp', 'homeController@search')->name('search.bootcamp');

Route::post('store', 'bootcampController@store')->name('bootcamp.store');



Route::get('/deletealumni/', 'bootcampController@delAlumni')->name('alumni.delete');



// Route::get('/skill', 'skillController@index')->name('index');
// Route::post('/skill', 'skillController@skill')->name('skill');

Route::get('/applyin/{id}', 'applyController@in')->name('applyin');
Route::get('/applyink/{id}', 'applyController@inkeep')->name('applyink');
Route::post('/apply/storein/{id}', 'applyController@storein')->name('storein');
Route::post('/apply/storeinkeep/{id}', 'applyController@storeinkeep')->name('storeink');
Route::get('/move/tofile', 'talentController@tofile')->name('tofile');


Route::get('/jobs', 'homeController@apply')->name('homapply');
Route::get('/jobs-old', 'homeController@applyOld')->name('homapply');
Route::get('/jobs/{id}', 'homeController@detail')->name('detail');
Route::get('/jobs/apply/{id}', 'applyController@index')->name('apply');
Route::post('/apply/store/{id}', 'applyController@store')->name('store');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/move', 'homeController@move')->name('move');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/browse', 'BrowseController@index')->name('browse');
Route::get('/daftar', 'DaftarController@index')->name('daftar');
Route::get('/reference', 'ReferenceController@index')->name('reference');
Route::get('/referral', 'ReferralController@index')->name('referral');
Route::get('/success', 'SuccessController@index')->name('successapply');



Route::get('/cek_import_talent', 'talentController@cek_import_talent')->name('cek_imp_talent');
Route::get('/cek_import_jobsapply', 'talentController@cek_import_jobsapply')->name('cek_imp_jobsapply');

Route::get('debug','homeController@debug');



$this->post('register', 'Auth\RegisterController@register');


Route::get('/startproject', 'homeController@startProject')->name('startProject');

//MEMBER PROFILE
Route::get('/profile/{id}','MemberController@CV');
