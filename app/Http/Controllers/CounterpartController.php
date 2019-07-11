<?php

namespace App\Http\Controllers;

use App\Models\ContactFace;
use App\Models\Counterpart;
use App\Models\InteractionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CounterpartController extends Controller
{
    public function index()
    {
        $counterparts = Counterpart::get();
        return view('manager.index', ['counterparts' => $counterparts]);
    }

    public function create()
    {
        $counCFArr = DB::table('counterparts_contact_faces')->pluck('contact_faces_id')->toArray();
        $contactFaces = ContactFace::whereNotIn('id', $counCFArr)->get();
        return view('manager.create', ['contactFacesFree' => $contactFaces]);
    }

    public function history()
    {
        $history = InteractionHistory::where('user_id', \Auth::user()->id)->get();
        return view('manager.history', ['history' => $history]);
    }

    public function createPost(Request $request)
    {
        $counterpart = new Counterpart;
        $counterpart->name = $request->name;
        $counterpart->inn = $request->inn;
        $counterpart->federal_district = $request->federal_district;
        $counterpart->city = $request->city;
        $counterpart->actual_address = $request->actual_address;
        $counterpart->clinic_class = $request->clinic_class;
        $counterpart->clinic_network = $request->clinic_network == 0 ? null : $request->clinic_network;
        $counterpart->clinic_size = $request->clinic_size;
        $counterpart->specialization = $request->specialization;
        $counterpart->save();

        if (isset($request->contactFaces) && $request->contactFaces == 'add')
        {
            $contactFace = new ContactFace;
            $contactFace->first_name = $request->first_name;
            $contactFace->last_name = $request->last_name;
            $contactFace->middle_name = $request->middle_name;
            $contactFace->post = $request->post;
            $contactFace->save();
        }

        if (isset($counterpart->id) && isset($contactFace->id))
        {
            DB::table('counterparts_contact_faces')->insertGetId([
                'counterparts_id' => $counterpart->id,
                'contact_faces_id' => $contactFace->id,
            ]);
        }

        if (isset($contactFace->id)) {
                foreach ($request->email as $email) {
                    if (isset($email)) {
                        $emailId = DB::table('emails')->insertGetId([
                            'email' => $email,
                        ]);

                        DB::table('contact_faces_emails')->insert([
                            'email_id' => $emailId,
                            'contact_faces_id' => $contactFace->id,
                        ]);
                    }
                }

                foreach ($request->phone as $phone) {
                    if (isset($phone)) {
                        $phoneId = DB::table('phones')->insertGetId([
                            'phone' => $phone,
                        ]);

                        DB::table('contact_faces_phones')->insert([
                            'phone_id' => $phoneId,
                            'contact_faces_id' => $contactFace->id,
                        ]);
                    }
                }

            if (isset($request->history)) {
                $interactionHistory = new InteractionHistory;
                $interactionHistory->contact_date = $request->contact_date;
                $interactionHistory->next_contact_date = $request->next_contact_date;
                $interactionHistory->dialogue_type = $request->dialogueType;
                $interactionHistory->dialogue_sense = $request->dialogue_sense;
                $interactionHistory->arrangement = $request->arrangement;
                $interactionHistory->user_id = \Auth::user()->id;
                $interactionHistory->save();

                DB::table('interaction_history_contact_faces')->insert([
                    'interaction_history_id' => $interactionHistory->id,
                    'contact_faces_id' => $contactFace->id,
                ]);
            }
        }

       return ['success'];
    }

    public function search(Request $request)
    {
        $search = Counterpart::orWhere('name', 'LIKE',  '%' . $request->search . '%')
            ->orWhere('inn', 'LIKE',  '%' . $request->search . '%')
            ->orWhere('city', 'LIKE',  '%' . $request->search . '%')
            ->get();
        return $search;
    }

    public function searchContactFace(Request $request)
    {
        $search = ContactFace::with('historyContactFaces')
            ->with('phones')
            ->with('emails')
            ->find($request->id);
        return $search;
    }

    public function edit($id)
    {
        $counterpart = Counterpart::find($id);
        $counCFArr = DB::table('counterparts_contact_faces')->pluck('contact_faces_id')->toArray();
        $contactFaces = ContactFace::whereNotIn('id', $counCFArr)->get();

        return view('manager.edit', ['counterpart' => $counterpart, 'contactFacesFree' => $contactFaces]);
    }

    public function editPost(Request $request, $id)
    {
        $counterpart = Counterpart::find($id);
        $counterpart->name = $request->name;
        $counterpart->inn = $request->inn;
        $counterpart->federal_district = $request->federal_district;
        $counterpart->city = $request->city;
        $counterpart->actual_address = $request->actual_address;
        $counterpart->clinic_class = $request->clinic_class;
        $counterpart->clinic_network = $request->clinic_network == 0 ? null : $request->clinic_network;
        $counterpart->clinic_size = $request->clinic_size;
        $counterpart->specialization = $request->specialization;
        $counterpart->save();

        if (isset($request->contactFaces) && $request->contactFaces == 'add')
        {
            $contactFace = new ContactFace;
            $contactFace->first_name = $request->first_name;
            $contactFace->last_name = $request->last_name;
            $contactFace->middle_name = $request->middle_name;
            $contactFace->post = $request->post;
            $contactFace->save();

            if (isset($counterpart->id) && isset($contactFace->id))
            {
                DB::table('counterparts_contact_faces')->insertGetId([
                    'counterparts_id' => $counterpart->id,
                    'contact_faces_id' => $contactFace->id,
                ]);
            }
        } else {
            $contactFace = ContactFace::find($request->contactFaces);
            $contactFace->first_name = $request->first_name;
            $contactFace->last_name = $request->last_name;
            $contactFace->middle_name = $request->middle_name;
            $contactFace->post = $request->post;
            $contactFace->save();
        }

        if (isset($contactFace->id)) {
            foreach ($request->email as $email) {
                if (isset($email)) {
                    $emailId = DB::table('emails')->where('emails.email', '!=', $email)->insertGetId([
                        'email' => $email,
                    ]);

                    if (isset($emailId)) {
                        DB::table('contact_faces_emails')->insert([
                            'email_id' => $emailId,
                            'contact_faces_id' => $contactFace->id,
                        ]);
                    }
                }
            }

            foreach ($request->phone as $phone) {
                if (isset($phone)) {
                    $phoneId = DB::table('phones')->where('phones.phone', '!=', $phone)->insertGetId([
                        'phone' => $phone,
                    ]);

                    if (isset($phoneId)){
                        DB::table('contact_faces_phones')->insert([
                            'phone_id' => $phoneId,
                            'contact_faces_id' => $contactFace->id,
                        ]);
                    }
                }
            }

            if (isset($request->history)) {
                $interactionHistory = new InteractionHistory;
                $interactionHistory->contact_date = $request->contact_date;
                $interactionHistory->next_contact_date = $request->next_contact_date;
                $interactionHistory->dialogue_type = $request->dialogueType;
                $interactionHistory->dialogue_sense = $request->dialogue_sense;
                $interactionHistory->arrangement = $request->arrangement;
                $interactionHistory->user_id = \Auth::user()->id;
                $interactionHistory->save();

                DB::table('interaction_history_contact_faces')->insert([
                    'interaction_history_id' => $interactionHistory->id,
                    'contact_faces_id' => $contactFace->id,
                ]);
            }
        }

        return ['success'];
    }

    public function contactFace($id)
    {
        $contactFace = ContactFace::with('phones', 'emails')->find($id);
        return $contactFace;
    }

    public function destroy()
    {
//        $address = './files/Country.xlsx';
//        Excel::load($address, function($reader) {
//            foreach ($reader->toArray() as $row)
//            {
//                foreach ($row as $val) {
//                    //Cтрана
//                    if (isset($val['strana']) && $val['strana'] != '') {
//                        $country = DB::table('countries')->where('name', $val['strana'])->get();
//                        if (count($country) == 0) {
//                            $coyntryId = DB::table('countries')->insertGetId([
//                                'name' => $val['strana'],
//                            ]);
//                        }
//                    }
//
//                    //Округ
//                    if (isset($val['fed_okrug']) && $val['fed_okrug'] != '') {
//                        preg_match('#\((.*?)\)#', $val['fed_okrug'], $nameFO);
//                        $codeFO = preg_replace("/\([^)]+\)/", "", $val['fed_okrug']);
//                        $codeFO = preg_replace('/\s+/', '', $codeFO);
//                        $federal_districts = DB::table('federal_districts')->where('name', $nameFO[1])->where('code', $codeFO)->get();
//                        if (count($federal_districts) == 0) {
//                            $federalDistrictsId = DB::table('federal_districts')->insertGetId([
//                                'name' => $nameFO[1],
//                                'code' => $codeFO,
//                                'country_id' => $coyntryId
//                            ]);
//                        }
//                    }
//
//                    //Область
//                    if (isset($val['oblast']) && $val['oblast'] != '' && isset($federalDistrictsId)) {
//                        $region = DB::table('regions')->where('name', $val['oblast'])->get();
//                        if (count($region) == 0) {
//                            $regionId = DB::table('regions')->insertGetId([
//                                'name' => $val['oblast'],
//                                'federal_district_id' => $federalDistrictsId
//                            ]);
//                        }
//                    }
//
//                    //Город
//                    if (isset($val['fed_okrugoblast_kraygorod']) && $val['fed_okrugoblast_kraygorod'] != '' && isset($regionId)) {
//                        $city = DB::table('cities')->where('name', $val['fed_okrugoblast_kraygorod'])->get();
//
//                        $gorod = $val['fed_okrugoblast_kraygorod'];
//
//                        $obl = strpos($gorod, 'область');
//                        $kra = strpos($gorod, 'край');
//                        $resp = strpos($gorod, 'республика');
//
//                        dd(!isset($obl));
//
//                        if (count($city) == 0 && !isset($obl) && !isset($kra) && !isset($resp)) {
//                            DB::table('cities')->insertGetId([
//                                'name' => $val['fed_okrugoblast_kraygorod'],
//                                'region_id' => $regionId
//                            ]);
//                        }
//                    }
//                }
//            }
//        });


//        $address = './files/First.xlsx';
//        Excel::load($address, function($reader)
//        {
//            foreach ($reader->toArray() as $row)
//            {
//                foreach ($row as $val)
//                {
//                    if (isset($val['opisanie']))
//                    {
//                        preg_match_all("/(.*:)[ ]*(\S*(?:[ ]+\S+)*)$/m", $val['opisanie'], $opisanie);
//
//                        $counterpart = new Counterpart;
//                        $contactFace = new ContactFace;
//
//                        //Город
//                        if (isset($val['gorod']))
//                        {
//                            $counterpart->city = $val['gorod'];
//                        }
//
//                        //Адрес
//                        if (isset($val['adres']))
//                        {
//                            $counterpart->actual_address = $val['adres']; //Адрес
//                        }
//
//                        foreach ($opisanie[1] as $key => $value)
//                        {
//                            //01 КЛИЕНТ:
//                            if ($value == '01 КЛИЕНТ:' || $value == 'Описание:01 КЛИЕНТ:')
//                            {
//                                if (isset($opisanie[2][$key]) && $opisanie[2][$key] != '')
//                                {
//                                    $name = preg_replace('|\s+|', ' ', $opisanie[2][$key]);
//                                    $counterpart->name = $name;
//                                }
//                            }
//
//                            //Конт лицо № 1:
//                            if ($value == 'Конт лицо № 1:')
//                            {
//                                if (isset($opisanie[2][$key]) && $opisanie[2][$key] != '')
//                                {
//                                    $contactFace->first_name = $opisanie[2][$key];
//                                }
//                            }
//
//                            //Долж, спец:
//                            if ($value == 'Долж, спец:')
//                            {
//                                if (isset($opisanie[2][$key]) && $opisanie[2][$key] != '')
//                                {
//                                    $contactFace->post = $opisanie[2][$key];
//                                }
//                            }
//                        }
//
//                        //Сохранение
//                        if (isset($contactFace->first_name) && $contactFace->first_name != '')
//                        {
//                            $contactFace->save();
//                        }
//
//                        if (isset($contactFace->id))
//                        {
//                            foreach ($opisanie[1] as $key => $value)
//                            {
//                                //Телефон:
//                                if ($value == 'Телефон:') {
//                                    if (isset($opisanie[2][$key]) && $opisanie[2][$key] != '')
//                                    {
//                                        $phoneId = DB::table('phones')->where('phones.phone', '!=', $opisanie[2][$key])->insertGetId([
//                                            'phone' => $opisanie[2][$key],
//                                        ]);
//                                        if (isset($phoneId))
//                                        {
//                                            DB::table('contact_faces_phones')->insert([
//                                                'phone_id' => $phoneId,
//                                                'contact_faces_id' => $contactFace->id,
//                                            ]);
//                                        }
//                                    }
//                                }
//
//                                //E-mail:
//                                if ($value == 'E-mail:') {
//                                    if (isset($opisanie[2][$key]) && $opisanie[2][$key] != '')
//                                    {
//                                        $emailId = DB::table('emails')->where('emails.email', '!=', $opisanie[2][$key])->insertGetId([
//                                            'email' => $opisanie[2][$key],
//                                        ]);
//                                        if (isset($emailId)) {
//                                            DB::table('contact_faces_emails')->insert([
//                                                'email_id' => $emailId,
//                                                'contact_faces_id' => $contactFace->id,
//                                            ]);
//                                        }
//                                    }
//                                }
//                            }
//                        }
//
//                        //Сохранение
//                        if (isset($counterpart->name) && $counterpart->name != '')
//                        {
//                            $counterpart->save();
//                        }
//
//                        if (isset($counterpart->id) && isset($contactFace->id))
//                        {
//                            DB::table('counterparts_contact_faces')->insert([
//                                'counterparts_id' => $counterpart->id,
//                                'contact_faces_id' => $contactFace->id
//                            ]);
//                        }
//                    }
//                }
//            }
//        });
        return 'Success!';
    }
}
