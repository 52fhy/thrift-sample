<?php
namespace Sample;

/**
 * Autogenerated by Thrift Compiler (0.12.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class Response
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'errCode',
            'isRequired' => true,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'errMsg',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'data',
            'isRequired' => true,
            'type' => TType::MAP,
            'ktype' => TType::STRING,
            'vtype' => TType::STRING,
            'key' => array(
                'type' => TType::STRING,
            ),
            'val' => array(
                'type' => TType::STRING,
                ),
        ),
    );

    /**
     * @var int
     */
    public $errCode = null;
    /**
     * @var string
     */
    public $errMsg = null;
    /**
     * @var array
     */
    public $data = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['errCode'])) {
                $this->errCode = $vals['errCode'];
            }
            if (isset($vals['errMsg'])) {
                $this->errMsg = $vals['errMsg'];
            }
            if (isset($vals['data'])) {
                $this->data = $vals['data'];
            }
        }
    }

    public function getName()
    {
        return 'Response';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->errCode);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->errMsg);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::MAP) {
                        $this->data = array();
                        $_size7 = 0;
                        $_ktype8 = 0;
                        $_vtype9 = 0;
                        $xfer += $input->readMapBegin($_ktype8, $_vtype9, $_size7);
                        for ($_i11 = 0; $_i11 < $_size7; ++$_i11) {
                            $key12 = '';
                            $val13 = '';
                            $xfer += $input->readString($key12);
                            $xfer += $input->readString($val13);
                            $this->data[$key12] = $val13;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('Response');
        if ($this->errCode !== null) {
            $xfer += $output->writeFieldBegin('errCode', TType::I32, 1);
            $xfer += $output->writeI32($this->errCode);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->errMsg !== null) {
            $xfer += $output->writeFieldBegin('errMsg', TType::STRING, 2);
            $xfer += $output->writeString($this->errMsg);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->data !== null) {
            if (!is_array($this->data)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('data', TType::MAP, 3);
            $output->writeMapBegin(TType::STRING, TType::STRING, count($this->data));
            foreach ($this->data as $kiter14 => $viter15) {
                $xfer += $output->writeString($kiter14);
                $xfer += $output->writeString($viter15);
            }
            $output->writeMapEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}