<?php

namespace App\Http\Controllers\Queue;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Queue\DeleteQueueRequest;
use App\Http\Requests\Queue\UpdateQueueRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\Queue\QueueService;

class QueueController extends Controller
{
    public function __construct(protected QueueService $queueService){}

    public function index(){
        try{
            $data = $this->queueService->index();
            return ReturnApi::success($data, 'Fila de espera listada com sucesso.');
        }catch(ApiException $ex){
            throw new ApiException($ex->getMessage() ?? 'Erro ao listar fila atual.', $ex->getCode() ?? 500);
        }
    }
}
