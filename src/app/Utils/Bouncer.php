<?php


namespace App\Utils;


use App\Models\Worker;
use App\Traits\ApiResource;
use \Exception;
use Illuminate\Database\Eloquent\Model;
use Silber\Bouncer\BouncerFacade;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

/**
 * @method static boolean can(string $permission, string $subject) ex. if(Bouncer::can('manage', Worker::class))
 * @method static Bouncer allow(string $permission)
 * @method static Bouncer forbid(string $permission)
 * @method everything()
 * @method toManage(string $classQualifier)
 */
class Bouncer extends BouncerFacade
{

    public static function TryDelete(string $classReference, Model $resource)
    {
        if(!self::can('manage', $classReference)){
            return response()->json(['message' => 'You can not delete any workers'], ResponseCode::HTTP_FORBIDDEN);
        }
        try {
            $resource->delete();
        } catch (Exception $e) {
            response()->json($e, 500);
        }
        return response()->json('', ResponseCode::HTTP_NO_CONTENT);
    }
}