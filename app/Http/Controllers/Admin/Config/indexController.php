<?php

namespace App\Http\Controllers\Admin\Config;

use App\Helper\funcHelper;
use App\Helper\imageUpload;
use App\Helper\notificationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\faqRequest;
use App\Models\Faq;
use App\Models\SiteConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class indexController extends Controller
{
    public function index()
    {
        $data = SiteConfig::where('id','=',1)->get();
        return view('admin.config.index',['data'=>$data]);
    }

    public function update(Request $request)
    {
        $config = $request["config"];
        $all = $request->except('_token','config');
        $control = SiteConfig::where('id','=',1)->count();
        if ($config == "general")
        {
            $appname = funcHelper::encodeAppName($all['siteName']);
            funcHelper::setEnv("APP_NAME",$appname);
            $update = SiteConfig::where('id','=',1)->update($all);
            if ($update)
            {
                return notificationHelper::sendNotification('success','update');
            }
            else
            {
                return notificationHelper::sendNotification('error');
            }
        }
        elseif ($config == "mail")
        {
            funcHelper::setEnv("MAIL_HOST",$all['mailHost']);
            funcHelper::setEnv("MAIL_PORT",$all['mailSmtpPort']);
            funcHelper::setEnv("MAIL_USERNAME",$all['mailUser']);
            funcHelper::setEnv("MAIL_PASSWORD",$all['mailPassword']);
            funcHelper::setEnv("MAIL_ENCRYPTION",$all['mailEncryption']);
            funcHelper::setEnv("MAIL_FROM_ADDRESS",$all['mailAddress']);
            $update = SiteConfig::where('id','=',1)->update($all);

            if ($update)
            {
                return notificationHelper::sendNotification('success','update');
            }
            else
            {
                return notificationHelper::sendNotification('error');
            }

        }
        elseif ($config == "language")
        {
           App::setLocale($all["language"]);
           $update = SiteConfig::where('id','=',1)->update($all);

           if ($update)
            {
                return redirect('admin/'.__('config'))->with(["status" =>"alert alert-success", "message"=>"Data Updated Successfully"]);
            }
            else
            {
                return redirect('admin/'.__('config'))->with(["status" =>"alert alert-danger", "message"=>"error"]);
            }

        }
        elseif ($config == "social")
        {
            $update = SiteConfig::where('id','=',1)->update($all);
            if ($update)
            {
                return redirect('admin/'.__('config'))->with(["status" =>"alert alert-success", "message"=>"Data Updated Successfully"]);
            }
            else
            {
                return redirect('admin/'.__('config'))->with(["status" =>"alert alert-danger", "message"=>"error"]);
            }
        }
        elseif ($config == "logo")
        {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $all['logo']= "images/logox.".$extension;
            $uploadimage = imageUpload::singleImageUpload("logox",$request->file('logo'));

            if ($uploadimage)
            {
                $update = SiteConfig::where('id','=',1)->update($all);
                if ($update)
                {
                    return notificationHelper::sendNotification('success','update');
                }
                else
                {
                    return notificationHelper::sendNotification('error');
                }
            }
            else
            {
                return notificationHelper::sendNotification('error');
            }

        }
        else if($config == "shipping")
        {
            $update = SiteConfig::where('id','=',1)->update($all);

            if ($update)
            {
                return redirect('admin/'.__('config'))->with(["status" =>"alert alert-success", "message"=>"Data Updated Successfully"]);
            }
            else
            {
                return redirect('admin/'.__('config'))->with(["status" =>"alert alert-danger", "message"=>"error"]);
            }
        }
        else if($config == "payment")
        {
            $update = SiteConfig::where('id','=',1)->update($all);

            if ($update)
            {
                return notificationHelper::sendNotification('success','update');
            }
            else
            {
                return notificationHelper::sendNotification('error');
            }
        }

    }

    public function info()
    {
        $data = SiteConfig::select('aboutus','termsConditions','privacyPolicy')->where('id','=',1)->get();

        return view('admin.config.info',['data'=>$data]);
    }

    public function infoUpdate(Request $request)
    {
        $config = $request["config"];
        $all = $request->except('_token','config');


            $update = SiteConfig::where('id','=',1)->update([
                $config => $all[$config]
            ]);

            if ($update)
            {
                return redirect()->back()->with(["status" =>"alert alert-success", "message"=>"Data Updated Successfully"]);
            }
            else
            {
                return redirect()->back()->with(["status" =>"alert alert-danger", "message"=>"error"]);
            }


    }

    public function faq()
    {
        $data = Faq::orderBy('id','DESC')->get();
        return view('admin.config.faq',['data'=>$data]);
    }

    public function faqUpdate(Request $request)
    {
        $id = $request['id'];
        $question = $request["question"];
        $reply = $request["reply"];

        $update = Faq::where('id','=',$id)->update(
            [
                "question" => $question,
                "reply" => $reply
            ]
        );

        if ($update)
        {
            return redirect()->back()->with(["status" =>"alert alert-success", "message"=>"Data Updated Successfully"]);
        }
        else
        {
            return redirect()->back()->with(["status" =>"alert alert-danger", "message"=>"error"]);
        }

    }

    public function faqDelete($id)
    {
        $control = Faq::where('id','=',$id)->count();

        if ($control>0)
        {
            $delete = Faq::where('id','=',$id)->delete();

            if($delete)
            {
                return redirect()->back()->with(["status" =>"alert alert-success", "message"=>"Data Deleted Successfully"]);
            }
            else
            {
                return redirect()->back()->with(["status" =>"alert alert-danger", "message"=>"error"]);
            }
        }
        else
        {
            return redirect()->back()->with(["status" =>"alert alert-danger", "message"=>"no data"]);
        }
    }

    public function faqCreate(faqRequest $request)
    {
        $all = $request->except('_token');

        $insert = Faq::create($all);

        if($insert)
        {
            return redirect()->back()->with(["status" =>"alert alert-success", "message"=>"Data Created Successfully"]);
        }
        else
        {
            return redirect()->back()->with(["status" =>"alert alert-danger", "message"=>"error"]);
        }

    }
}
