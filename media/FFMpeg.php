<?php
/*
 * Copyright (c) 2017 Teratech
 * All rights reserved.
 * Date: 5/19/2017
 * Time: 10:00 AM
 */


namespace backend\media;

use yii\base\Component;

/**
 * Class FFMpeg
 *
 * Description of FFMpeg
 *
 * @author Ramadan Juma (ramaj93@yahoo.com)
 *
 * @package backend\media
 */
class FFMpeg extends Component
{
    public $timeout;
    public $threads;
    public $ffmpeg;
    public $ffprobe;
    /**
     * @var \FFMpeg\FFMpeg
     */
    public $driver;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->driver = \FFMpeg\FFMpeg::create([
            'ffmpeg.binaries' => $this->ffmpeg,
            'ffprobe.binaries' => $this->ffprobe,
            'timeout' => $this->timeout, // The timeout for the underlying process
            'ffmpeg.threads' => $this->threads,   // The number of threads that FFMpeg should use
        ]);
    }

}