#!/bin/bash
virt-install \
--name opensuse11 \
--ram 1024 \
--disk path=./opensuse11.qcow2,size=8 \
--vcpus 1 \
--os-type linux \
--os-variant generic \
--network bridge=virbr0 \
--graphics none \
--console pty,target_type=serial \
--location 'http://download.opensuse.org/distribution/11.4/repo/oss/' \
--extra-args 'console=ttyS0,115200n8 serial'
