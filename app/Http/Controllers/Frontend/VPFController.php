<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepositoryContract;


class VPFController extends Controller
{
    /**
     * @var ImageRepositoryContract
     */
    protected $image;

    /**
     * @param ImageRepositoryContract $image
     */
    public function __construct(ImageRepositoryContract $image){
        $this->image = $image;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = \Auth::user();
        $forms = collect();
        $forms = $forms->merge($user->vpf->article15);
        $forms = $forms->merge($user->vpf->vcs);
        $forms = $forms->merge($user->vpf->ncs);
        $forms = $forms->merge($user->vpf->dcs);
        $forms = $forms->sortByDesc('created_at');

        $buildProfile = collect(
            ['serviceHistory'=>$user->vpf->serviceHistory,
                'ribbons'=>$user->vpf->ribbons,
                'qualifications'=>$user->vpf->qualifications,
                'operations'=>$user->vpf->operations,
                'schools'=>$user->vpf->schools,
                'forms'=> $forms,
            ]);
        return view('frontend.vpf.index')
            ->with('user',$user)
            ->with('profile',$buildProfile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function showFaces()
    {
        $user = \Auth::user();
        $faces_array = [
            ['id'=> 0,'file'=>'/frontend/images/faces/'.'default_face.png','name' => 'Default Face'],
            ['id'=> 1,'file'=>'/frontend/images/faces/'.'athanasiadas.png','name' => 'Athanasiadas'],
            ['id'=> 2,'file'=>'/frontend/images/faces/'.'bahadur.png','name' => 'Bahadur'],
            ['id'=> 3,'file'=>'/frontend/images/faces/'.'baros.png','name' => 'Baros'],
            ['id'=> 4,'file'=>'/frontend/images/faces/'.'bayh.png','name' => 'Bayh'],
            ['id'=> 5,'file'=>'/frontend/images/faces/'.'burr.png','name' => 'Burr'],
            ['id'=> 6,'file'=>'/frontend/images/faces/'.'byrne.png','name' => 'Byrne'],
            ['id'=> 7,'file'=>'/frontend/images/faces/'.'campbell.png','name' => 'Campbell'],
            ['id'=> 8,'file'=>'/frontend/images/faces/'.'christou.png','name' => 'Christou'],
            ['id'=> 9,'file'=>'/frontend/images/faces/'.'coburns.png','name' => 'Coburns'],
            ['id'=> 10,'file'=>'/frontend/images/faces/'.'collins.png','name' => 'Collins'],
            ['id'=> 11,'file'=>'/frontend/images/faces/'.'constantinou.png','name' => 'Constantinou'],
            ['id'=> 12,'file'=>'/frontend/images/faces/'.'costas.png','name' => 'Costas'],
            ['id'=> 13,'file'=>'/frontend/images/faces/'.'dayton.png','name' => 'Dayton'],
            ['id'=> 14,'file'=>'/frontend/images/faces/'.'dorgan.png','name' => 'Dorgan'],
            ['id'=> 15,'file'=>'/frontend/images/faces/'.'doukas.png','name' => 'Doukas'],
            ['id'=> 16,'file'=>'/frontend/images/faces/'.'gikas.png','name' => 'Gikas'],
            ['id'=> 17,'file'=>'/frontend/images/faces/'.'halliwell.png','name' => 'Halliwell'],
            ['id'=> 18,'file'=>'/frontend/images/faces/'.'hasan.png','name' => 'Hasan'],
            ['id'=> 19,'file'=>'/frontend/images/faces/'.'jalai.png','name' => 'Jalai'],
            ['id'=> 20,'file'=>'/frontend/images/faces/'.'jeoung.png','name' => 'Jeoung'],
            ['id'=> 21,'file'=>'/frontend/images/faces/'.'jesus.png','name' => 'Jesus'],
            ['id'=> 22,'file'=>'/frontend/images/faces/'.'johnson.png','name' => 'Johnson'],
            ['id'=> 23,'file'=>'/frontend/images/faces/'.'kanelloupou.png','name' => 'Kenelloupou'],
            ['id'=> 24,'file'=>'/frontend/images/faces/'.'kelly.png','name' => 'Kelly'],
            ['id'=> 25,'file'=>'/frontend/images/faces/'.'kirby.png','name' => 'Kirby'],
            ['id'=> 26,'file'=>'/frontend/images/faces/'.'martinez.png','name' => 'Martinez'],
            ['id'=> 27,'file'=>'/frontend/images/faces/'.'obrien.png','name' => 'O\'Brian'],
            ['id'=> 28,'file'=>'/frontend/images/faces/'.'oconnor.png','name' => 'O\'Connor'],
            ['id'=> 29,'file'=>'/frontend/images/faces/'.'osullivan.png','name' => 'O\'Sullivan'],
            ['id'=> 30,'file'=>'/frontend/images/faces/'.'reed.png','name' => 'Reed'],
            ['id'=> 31,'file'=>'/frontend/images/faces/'.'sabet.png','name' => 'Sabet'],
            ['id'=> 32,'file'=>'/frontend/images/faces/'.'santorum.png','name' => 'Santorum'],
            ['id'=> 33,'file'=>'/frontend/images/faces/'. 'savalas.png','name' => 'Savalas'],
            ['id'=> 34,'file'=>'/frontend/images/faces/'.'smith.png','name' => 'Smith'],
            ['id'=> 35,'file'=>'/frontend/images/faces/'.'snowe.png','name' => 'Snowe'],
            ['id'=> 36,'file'=>'/frontend/images/faces/'.'tung.png','name' => 'Tung'],
            ['id'=> 37,'file'=>'/frontend/images/faces/'.'walsh.png','name' => 'Walsh'],
            ['id'=> 38,'file'=>'/frontend/images/faces/'.'williams.png','name' => 'Williams'],
            ['id'=> 39,'file'=>'/frontend/images/faces/'.'ximi.png','name' => 'Ximi'],
        ];
        return view('frontend.vpf.faces')
            ->with('user',$user)
            ->with('faces',$faces_array);
    }

    public function saveFace(Request $request)
    {
        $user = \Auth::user();
        $user->vpf->face_id = $request->face_id;
        $user->push();

        \Notification::success('Face has been updated.');
        return redirect('/virtual-personnel-file/');

    }


    /**
     * Returns the CAC Card
     * @param $steam_id
     * @return mixed
     */
    public function buildCACCard($steam_id)
    {
        $user = User::where('steam_id','=',$steam_id)->first();

        $faces_array = [
            'default_face.png',
            'athanasiadas.png',
            'bahadur.png',
            'baros.png',
            'bayh.png',
            'burr.png',
            'byrne.png',
            'campbell.png',
            'christou.png',
            'coburns.png',
            'collins.png',
            'constantinou.png',
            'costas.png',
            'dayton.png',
            'dorgan.png',
            'doukas.png',
            'gikas.png',
            'halliwell.png',
            'hasan.png',
            'jalai.png',
            'jeoung.png',
            'jesus.png',
            'johnson.png',
            'kenelloupou.png',
            'kelly.png',
            'kirby.png',
            'martinez.png',
            'obrien.png',
            'oconnor.png',
            'osullivan.png',
            'reed.png',
            'sabet.png',
            'santorum.png',
            'savalas.png',
            'smith.png',
            'snowe.png',
            'tung.png',
            'walsh.png',
            'williams.png',
            'ximi.png',
        ];
        $images = public_path().'/frontend/images/faces/';

        $face=\Image::make($images.$faces_array[$user->vpf->face_id])->resize(106,139);

        // Create Image
        $img = \Image::canvas(223,340);

        $img->insert($images.'background.png');
        $img->insert($face,'top-left',13,16);

        // Name Field
        $img->text($user->vpf->last_name.',',15,175,function($font){
            $images = public_path().'/frontend/images/faces/';
            $font->file($images.'slc.ttf');
            $font->size(16);
        });
        $img->text($user->vpf->first_name,15,190,function($font){
            $images = public_path().'/frontend/images/faces/';
            $font->file($images.'slc.ttf');
            $font->size(16);
        });

        // Paygrade
        $img->text($user->vpf->rank->pay_grade,140,270,function($font){
            $images = public_path().'/frontend/images/faces/';
            $font->file($images.'slc.ttf');
            $font->size(12);
        });

        // Rank
        $img->text($user->vpf->rank->abbreviation,180,270,function($font){
            $images = public_path().'/frontend/images/faces/';
            $font->file($images.'slc.ttf');
            $font->size(12);
        });


        // create response and add encoded image data
        $img = \Response::make($img->encode('png'));

        // set content-type
        $img->header('Content-Type', 'image/png');

        // output
        return $img;
    }

    public function buildAvatar($steam_id)
    {
        $images = public_path().'/frontend/images/avatars/';
        $user = User::where('steam_id','=',$steam_id)->first();

        if($user->vpf->rank->public_image == 'placeholder.png')
        {
            $rankImg = \Image::canvas(1, 1);
        } else {
            $rank = \Cloudder::show($user->vpf->rank->public_image, ['width' => '112','height'=>'110','crop'=>'fit']);
            $rankImg = \Image::make($rank);
        }

        $img = \Image::canvas(160,160)
            ->insert($images.'background.png')
            ->insert($rankImg,'center',0,28);


        // create response and add encoded image data
        $img = \Response::make($img->encode('png'));

        // set content-type
        $img->header('Content-Type', 'image/png');

        // output
        return $img;
    }




}
